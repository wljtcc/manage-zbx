<?php
/**
 * Created by PhpStorm.
 * User: wellington.jorge
 * Date: 8/28/17
 * Time: 3:45 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Response;
use Mockery\Exception;

class ZBXController {

    public function ZBXConn() {

        try{
            $url = 'http://zabbix.dataeasy.com.br/api_jsonrpc.php';
            $post = array(
                'jsonrpc' => '2.0',
                'method' => 'user.login',
                'params' => array(
                    'user' => 'wellington.jorge',
                    'password' => 'well@1982'
                ),
                'auth' => null,
                'id' => 1
            );
            $data = json_encode($post);
            $curl = exec("which curl");
            $curlStr = "$curl -X POST -d '$data' -H 'Content-Type: application/json' '$url'";
            $execCurl = exec($curlStr);
            $curlOutput = json_decode($execCurl);

            return $curlOutput->result;

        } catch (Exception $e) {
            echo "ERROR: ", $e->getMessage(), "\n";
        }

    }

    public function ZBXHost($token){

        try{
            $url = 'http://zabbix.dataeasy.com.br/api_jsonrpc.php';
            $post = array(
                'jsonrpc' => '2.0',
                'method' => 'host.get',
                'params' => array(
                    "output" => array("hostid", "host", "available"),
                    "selectInterfaces" => array("interfaceid", "ip")
                ),
                'auth' => $token,
                'id' => 2
            );

            $data = json_encode($post);
            $curl = exec("which curl");
            $curlStr = "$curl -X POST -d '$data' -H 'Content-Type: application/json' '$url'";
            $execCurl = exec($curlStr);
            $curlOutput = json_decode($execCurl);

            return $curlOutput->result;

        } catch (Exception $e) {
            echo "ERROR: ", $e->getMessage(), "\n";
        }
    }

    public function ZBXVersion($token){

        try{
            $url = 'http://zabbix.dataeasy.com.br/api_jsonrpc.php';
            $post = array(
                'jsonrpc' => '2.0',
                'method' => 'graph.get',
                'params' => array(
                    "output" => array("hostid", "host", "available"),
                    "selectInterfaces" => array("interfaceid", "ip")
                ),
                'auth' => $token,
                'id' => 2
            );

            $data = json_encode($post);
            $curl = exec("which curl");
            $curlStr = "$curl -X POST -d '$data' -H 'Content-Type: application/json' '$url'";
            $execCurl = exec($curlStr);
            $curlOutput = json_decode($execCurl);

            return $curlOutput->result;

        } catch (Exception $e) {
            echo "ERROR: ", $e->getMessage(), "\n";
        }
    }

    public function ZBXGraph($token, $hostids,$graphids){

        try{
            $url = 'http://zabbix.dataeasy.com.br/api_jsonrpc.php';
            $post = array(
                'jsonrpc' => '2.0',
                'method' => 'graph.get',
                'params' => array(
                    "output" => "extend",
                    "hostids" => $hostids,
                    "graphids" => $graphids,


                    "sortfield" => "name"
                ),
                'auth' => $token,
                'id' => 1
            );

            $data = json_encode($post);
            $curl = exec("which curl");
            $curlStr = "$curl -X POST -d '$data' -H 'Content-Type: application/json' '$url'";
            $execCurl = exec($curlStr);
            $curlOutput = json_decode($execCurl);

            return $curlOutput->result;

        } catch (Exception $e) {
            echo "ERROR: ", $e->getMessage(), "\n";
        }

    }

    public function ZBXMain(){

        // Connect Zabbix
        $token = ZBXController::ZBXConn();
        //echo json_encode($token);

        //$version = ZBXController::ZBXVersion();
        //echo "<p>Versão ZBX: ", $version;
        //echo json_encode($version);


        // Call Host ZBX
        $host = ZBXController::ZBXHost($token);
        //echo json_encode($host);

        /*foreach ($host as $zbx) {
            echo "<p>", $zbx->host;
            echo "<p>", $zbx->hostid;
        }*/

        echo "GRAPHIC<p><p>";
        $hostids = 10129;
        $graphids = 758;
        $graph = ZBXController::ZBXGraph($token, $hostids, $graphids);
        echo json_encode($graph);

        foreach ($graph as $graphs) {
            echo "<p>", $graphs->name;
            echo "<p>", $graphs->graphid;
        }
    }


}