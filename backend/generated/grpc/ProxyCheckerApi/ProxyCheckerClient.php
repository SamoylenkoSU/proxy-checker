<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ProxyCheckerApi;

/**
 */
class ProxyCheckerClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \ProxyCheckerApi\ProxyRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function check(\ProxyCheckerApi\ProxyRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/proxy_checker_api.ProxyChecker/check',
        $argument,
        ['\ProxyCheckerApi\ProxyResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \ProxyCheckerApi\ProxyRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function checkStream(\ProxyCheckerApi\ProxyRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/proxy_checker_api.ProxyChecker/checkStream',
        $argument,
        ['\ProxyCheckerApi\ProxyCheckResult', 'decode'],
        $metadata, $options);
    }

}
