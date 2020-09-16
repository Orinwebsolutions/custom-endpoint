<?php
class EndPointPublicTest extends PHPUnit\Framework\TestCase {
    use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    public function setUp(): void {
		\WP_Mock::setUp();
	}

	public function tearDown(): void {
		\WP_Mock::tearDown();
	}
    
    public function publicClassFn(){
        $pluginName = 'custom-endpoint';
		$pluginVersion = '1.0.0';

        $plugin = Mockery::mock( 'plugin', [
            'plugin' => $pluginName,
        ] );

        $version = Mockery::mock( 'version', [
            'version' => $pluginVersion,
        ] );
        return new Custom_Endpoint_Public($plugin, $version );
    }

    public function testCustomQueryVarsAdvanced() {

        $expectedAnswer = ['custom_api'];
        $query_vars = [];
        $cusApi = $this->publicClassFn();
        $result = $cusApi->custom_query_vars($query_vars);
        $this->assertEquals($expectedAnswer, $result);
        
    }


    
    public function testApiRequest()
    {

        $num = array("Garha","sitamarhi","canada","patna"); 
        $obj = (object)$num;
        $args1 = array(
			'method'  => 'GET',
			'timeout' => 30
        );

		\WP_Mock::userFunction( 'wp_remote_request', array(
			'times' => 1,
            'args' => array('https://jsonplaceholder.typicode.com/users', $args1),
            'return' => $obj
        ) );
            
        $cusApi = $this->publicClassFn();

        $arg = array();
        $result = $cusApi->request_new('GET', 'users', $arg);
        print_r($result);
        $this->assertIsObject($result);
          
    }
}

