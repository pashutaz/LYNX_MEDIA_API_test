<?php
/**
 * Created by PhpStorm.
 * User: pashutaz
 * Date: 25/07/2018
 * Time: 22:04
 */
use PHPUnit\Framework\TestCase;

class APITest extends TestCase
{
    public function testItemRead()
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8888/api/item/key/");
        curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->assertEquals(200, $httpcode);

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8888/api/item/qwerwqerewrqwerqwerqwerqwer/");
        curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->assertEquals(403, $httpcode);

        curl_close($curl);
    }
    public function testItemCreate()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, true);

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8888/api/item/key/name");
        curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->assertEquals(201, $httpcode);

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8888/api/item/key/");
        curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->assertEquals(400, $httpcode);

        curl_close($curl);
    }
    public function testItemUpdate()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_PUT, true);

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8888/api/item/key/id/new_name");
        curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->assertEquals(200, $httpcode);

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8888/api/item/key/");
        curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->assertEquals(400, $httpcode);

        curl_close($curl);
    }
    public function testItemDelete()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8888/api/item/key/id");
        curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->assertEquals(200, $httpcode);

        curl_setopt($curl, CURLOPT_URL, "http://localhost:8888/api/item/key/");
        curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->assertEquals(400, $httpcode);

        curl_close($curl);
    }
}