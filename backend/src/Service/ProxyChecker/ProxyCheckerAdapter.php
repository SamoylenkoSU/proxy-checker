<?php

namespace App\Service\ProxyChecker;

use App\Entity\Enum\ProxyType;
use App\Service\ProxyChecker\Dto\ProxyCheckResult;
use ProxyCheckerApi\ProxyCheckerClient;
use ProxyCheckerApi\ProxyRequest;
use ProxyCheckerApi\ProxyResponse;

class ProxyCheckerAdapter implements ProxyCheckerInterface
{
    public function __construct(
        private readonly ProxyCheckerClient $client
    ) {
    }

    /**
     * @param array<string> $proxy
     * @return array<ProxyCheckResult>
     */
    public function check(array $proxy): array
    {
        $request = new ProxyRequest();
        $request->setValue($proxy);
        $call = $this->client->check($request);

        /** @var ProxyResponse $response  */
        [$response] = $call->wait();

        if (is_null($response)) {
            throw new \Exception('Failed to connect to proxy checker service');
        }

        $result = [];

        /** @var \ProxyCheckerApi\ProxyCheckResult $item */
        foreach ($response->getCheckResult() as $item) {
            if (is_null($item->getInfo())) {
                $result[] = new ProxyCheckResult(
                    $item->getValue(),
                    $item->getActive(),
                );
            } else {
                $result[] = new ProxyCheckResult(
                    $item->getValue(),
                    $item->getActive(),
                    ProxyType::tryFrom($item->getInfo()->getType()),
                    $this->emptyStringToNull($item->getInfo()->getCountry()),
                    $this->emptyStringToNull($item->getInfo()->getCity()),
                    $this->emptyStringToNull($item->getInfo()->getExternalIp()),
                    $item->getInfo()->getTimeout(),
                );
            }
        }

        return $result;
    }

    private function emptyStringToNull(string $value): ?string
    {
        return trim($value) === '' ? null : $value;
    }
}