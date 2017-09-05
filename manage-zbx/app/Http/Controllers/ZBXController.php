<?php
/**
 * Created by PhpStorm.
 * User: wellington.jorge
 * Date: 8/28/17
 * Time: 3:45 PM
 */

namespace App\Http\Controllers;


use App\Hosts;
use App\VWListHostIP;
use App\VWListHostsPercent;
use App\VWListHostsValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Mockery\Exception;

class ZBXController {

    public function ZBCDBConn(){

        try {
            DB::connection()->getPdo();

        } catch (Exception $e){
            die("Could not connect to the database.  Please check your configuration.");
        }
    }

    public function ZBXHostsJson(){
        // Retorna uma lista em JSON

        //$hosts = DB::select('select hostid, host from HOSTS where status in (0,1)');
        $status = array(0,1);
        $hosts = Hosts::select('hostid','host')
                        ->whereIn('status', $status)
                        ->where('flags', 0)
                        ->get();

        // return $products;
        // Explicito que o formato será em JSON
        return response()->json($hosts);

    }

    public function ZBXDate(){
        //test
        $timestamp = 1504125594;
        echo "TimeStamp: ", date('d.m.Y',$timestamp);

        echo "<p>";
        $date = "30.08.2017";
        echo strtotime($date);
        echo "<p>";
        $datenow = (new \DateTime())->format('dmY');
        echo $datenow;
    }

    public function ZBXHost(){

        try{
            $status = array(0,1);
            $hosts = Hosts::whereIn('status', $status)->get();

            if (view()->exists('zbx.listhost')){
                return view('zbx.listhost')->withHosts($hosts);
            } else{
                die("ERROR");
            }

        } catch (Exception $e) {
            echo "ERROR: ", $e->getMessage(), "\n";
        }
    }

    public function ZBXFindPercent(){

        try{
            $hosts = VWListHostsPercent::where('hostid', 10132)
                                    ->orderBy('clock', 'desc')
                                    ->take(10)
                                    ->get();

            foreach ($hosts as $h){
                echo "<p>", $h->host;
            }

        } catch (Exception $e) {
            echo "ERROR: ", $e->getMessage(), "\n";
        }
    }

    public function ZBXFindValue(){

        try{
            $hosts = VWListHostsValue::where('hostid', 10132)
                ->orderBy('clock', 'desc')
                ->take(10)
                ->get();

            foreach ($hosts as $h){
                echo "<p>", $h->host;
            }

        } catch (Exception $e) {
            echo "ERROR: ", $e->getMessage(), "\n";
        }
    }

    public function ZBXFindValueMemory(){
        // Available memory

        try{
            $this->ZBXFindValueTMemory();
            $this->ZBXFindValueAMemory();
            $this->ZBXFindValueFMemory();

        } catch (Exception $e) {
            echo "ERROR: ", $e->getMessage(), "\n";
        }
    }

    public function ZBXFindValueAMemory(){
        // Available memory

        try{
            $hosts = VWListHostsValue::where('hostid', 10132)
                ->where('key_', 'vm.memory.size[available]')
                ->take(1)
                ->get();

            foreach ($hosts as $h){
                echo "<p>", $h->host;
                echo "<p> Available memory: ", number_format($h->value/1024/1024/1024,2), " GB";
            }

        } catch (Exception $e) {
            echo "ERROR: ", $e->getMessage(), "\n";
        }
    }

    public function ZBXFindValueTMemory(){
        // Total memory

        try{
            $hosts = VWListHostsValue::where('hostid', 10132)
                ->where('key_', 'vm.memory.size[total]')
                ->take(1)
                ->get();

            foreach ($hosts as $h){
                echo "<p>", $h->host;
                echo "<p> Total memory: ", number_format($h->value/1024/1024/1024,2), " GB";
            }

        } catch (Exception $e) {
            echo "ERROR: ", $e->getMessage(), "\n";
        }
    }

    public function ZBXFindValueFMemory(){
        // Free memory

        try{
            $hosts = VWListHostsValue::where('hostid', 10132)
                ->where('key_', 'vm.memory.size[free]')
                ->take(1)
                ->get();

            foreach ($hosts as $h){
                echo "<p>", $h->host;
                echo "<p> Free memory: ", number_format($h->value/1024/1024/1024,2), " GB";
            }

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

    public function ZBXHostStatus(){

        // Host Available
        // 0 - Inativo
        // 1 - Ativo e Disponivel
        // 2 - Ativo e Indisponível

        try{

            $status = Request::input('status','-1');

            if ( $status == -1 ) {
                // All hosts
                $hosts = VWListHostIP::all();
            } elseif ( $status == -2){
                $hosts = VWListHostIP::all();
                return view('zbx.statusresume')->with('hosts', $hosts);
            } elseif ( $status != -1 ) {
                //Inactive Hosts
                echo "entrou aqui";
                echo $status;
                $hosts = VWListHostIP::where('available', $status)->get();
            } else {
                return "Status Not Found!!!";
            }

            return view('zbx.status')->with('hosts', $hosts);


        } catch (Exception $e) {
            echo "ERROR: ", $e->getMessage(), "\n";
        }

    }

}