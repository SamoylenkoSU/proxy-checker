<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\ProxyChecker;

use App\Application\CheckProxy\Dto\ProxyCheckResult;
use App\Application\CheckProxy\Dto\ProxyDetail;
use App\Application\CheckProxy\ProxyCheckerInterface;
use App\Domain\Entity\Enum\ProxyType;
use Exception;
use ProxyCheckerApi\ProxyCheckerClient;
use ProxyCheckerApi\ProxyRequest;
use ProxyCheckerApi\ProxyResponse;

readonly class ProxyCheckerAdapter implements ProxyCheckerInterface
{
    public function __construct(
        private ProxyCheckerClient $client,
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
            throw new Exception('Failed to connect to proxy checker service');
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
                    new ProxyDetail(
                        ProxyType::tryFrom($item->getInfo()->getType()),
                        $item->getInfo()->getExternalIp(),
                        $item->getInfo()->getTimeout(),
                        $this->emptyStringToNull($item->getInfo()->getCountry()),
                        $this->emptyStringToNull($item->getInfo()->getCity()),
                    ),
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
