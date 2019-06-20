<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;
use OhMyBrew\BasicShopifyAPI;
use Log;
use Excel;

class GetProductsController extends Controller
{
    public function index()
    
    {
        return view("welcome");
    }
    public function ebay_auth(Request $request)
    {
        ini_set("memory_limit", '-1');
        print_r($request);
        return;
    }
    public function get_ebay_products(){
        return view('ebay');
    }
    public function link_ebay(){
        return view('link_ebay');
    }
    public function amazon(){
        return view('amazon');
    }
    public function ation_get_ebay_products(){
        
        $api = new BasicShopifyAPI();
        // $api->setVersion('2019-04'); // "YYYY-MM" or "unstable"
        $api->setShop(ShopifyApp::shop()->shopify_domain);
        $api->setAccessToken(ShopifyApp::shop()->shopify_token);
        $AuthToken="AgAAAA**AQAAAA**aAAAAA**KfudXA**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wFk4aiCJmGoQSdj6x9nY+seQ**OvYEAA**AAMAAA**JQO+MOY1E+STcnzozp25CBZcr6326eiKm5GJ8S4oIV4A2/irlT4ucy+jvLWg8e2K5mG2ojMivisKuAwk0EfJ6rszI3ulr6JKDpMjjDnaGEbXb1whK5N0OUfg9NANEMz+LK4cTDBKRY4rpvYkWOOvci1iGdvePZrP07QNjODOJo5BJYulpPINa4TKRNbSWGbJogQh7VykLvYNxpofJJCfMurQxoWGzXCSvNahh34qXe2dr9Fb75Yljvhd2FSkqwGNSkOm23h3sWQk3C4by0SOq2LG+l57zPv/9wnNpVp035tm4/FiYsVDh45myrfRy2riY4SsE233u8mhZMyA5M7gAAn3lSS4gC0zWic1sDN6WjRLFvs18TR071ErZbmN1UdSVPRfZnYmEpkRICsha6E8RiHUjzq1MMAeES6TjqSkIdq5iGKWX/FAFLVMOsWqmyHY9uoPOkrdtNY9W8bcigNBEObivxaZTAUdUAeRa0Q+Lko2dx408QTzehwsq/HgKzzXnZI2ZHnrHgYnXWw3Z1h0IrAh7xNmSQLj9DYwIkGG3dcEYCbpVWYp0Z90Fj1MKo+O/yndQmt8wh2hqUZdXFlkyaLUYh/PD08VBSOruGyRckkKfB9mUfPUozSBNtlhyfnqg41pstoIxj7l2OsIP4TO73+3BMnMNvGSsIFxKZ8E7rrfPygj/KOoD7MqanryygLremOKol/rzKTQgrqCsX/GJ+lcYx8fV3es9qGIa+u10W4auKwbUETQnFIhYc8rihZa";
        $runame = "Th_c_L__B_-ThcLB-SynEbay-S-swfednxx";
        $xml =  "<?xml version='1.0' encoding='utf-8'
        <GetMyeBaySellingRequest xmlns='urn:ebay:apis:eBLBaseComponents'>
           <RequesterCredentials>
             <eBayAuthToken>".$AuthToken."</eBayAuthToken>
           </RequesterCredentials>
           <ErrorLanguage>en_US</ErrorLanguage>
           <WarningLevel>High</WarningLevel>
           <DetailLevel>ReturnAll</DetailLevel>
           <ActiveList>  
           </ActiveList>
           <SoldList>
               <Include>false</Include>
           </SoldList>
         
         </GetMyeBaySellingRequest>";
        $headers = array(
                    'Content-Type: text/xml',
                    'X-EBAY-API-COMPATIBILITY-LEVEL: 967',
                    'X-EBAY-API-CALL-NAME:GetMyeBaySelling',
                    'X-EBAY-API-SITEID: 0'
        );

// Curl Request to fetch data from ebay store
        $url = 'https://api.sandbox.ebay.com/ws/api.dll';      
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$xml);        
        curl_setopt($ch, CURLOPT_TIMEOUT, 400);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $result = curl_exec($ch);  
        curl_close($ch);
        $result_array=simplexml_load_string($result);
        $response_in_json = json_encode($result_array);
        $response_in_obj = json_decode($response_in_json);
       
        // //THis <pre> tag end on 158 line
        // echo "<pre>";  
        $items_arr = $response_in_obj->ActiveList->ItemArray->Item;
        $chk = 1;
        echo "<h1>".sizeof($items_arr)."</h1>";
        foreach ($items_arr  as $item) {

                print_r($item);
                $variation_arr = array();
                $option_indexing = 1;
                $option_tag_indexing = 1;
                $list_of_tag_name = array();
                $c = 1;
                $ind = 0;

                // THIS BELOW CODE WILL CREATE DYNAMICARRAY
                $variation_category_arr = array();
                $variation_arr_ready = array();
                $variation_arr_ready2 = [];
                $variation_options_arr = [];
                if(isset($item->Variations)){    
                foreach($item->Variations->Variation as $var)
                        {
                                for ($i=0; $i < sizeof($var->VariationSpecifics->NameValueList); $i++) { 
                                        array_push($variation_category_arr,array());
                                }
                                break;
                        }
                }

                if(isset($item->Variations)){
                        foreach($item->Variations->Variation as $var){

                                $arr_name = 1;
                                $dummy_arr2 = [];
                                foreach($var->VariationSpecifics->NameValueList as $v)
                                {
                                        // echo($v->Value);
                                        $dummy_arr2["option".$arr_name]  = $v->Value;
                                        $arr_name ++ ; 

                                        if($option_tag_indexing == 1)
                                                array_push($list_of_tag_name , $v->Name);                      
                                } 
                                array_push($variation_options_arr, $dummy_arr2);
                                for ($i=0; $i < sizeof($var->VariationSpecifics->NameValueList); $i++) { 
                                        foreach($var->VariationSpecifics as $ve)
                                        {
                                        // print_r($ve[$i]->Value);  
                                        array_push($variation_category_arr[$i],$ve[$i]->Value)  ;                        
                                    } 
                                }
                                $chk = 0;
                                $option_tag_indexing = -1;
                        }
                        // print_r($list_of_tag_name);
                        // echo sizeof($list_of_tag_name);
                        // print_r($variation_category_arr);
                     
                        for ($i=0; $i < sizeof($list_of_tag_name); $i++) { 
                                $variation_arr_ready["name"] = $list_of_tag_name[$i];
                                $dummy_arr = array();
                                foreach ($variation_category_arr[$i] as $value){ 
                                      array_push($dummy_arr, $value);
                                }
                                $variation_arr_ready["values"] = array_unique($dummy_arr);

                                array_push($variation_arr_ready2, $variation_arr_ready);
                        } 

                        // print_r($variation_arr_ready2);
                }
               

                $images_arr = array();
                
                if(isset($item->PictureDetails))
                        {
                                foreach ($item->PictureDetails as $img) {                            
                                        $img_arr = array(
                                                "src"=>'https://image.freepik.com/free-photo/little-girl-with-flowers-studio_1303-5624.jpg'
                                        );
                                        array_push($images_arr,$img_arr);
                                }
                        }
                $pr = array(
                        "title"=> $item->Title,
                        "body_html"=> "<strong>".$item->Title."</strong>",
                        "vendor"=> "Aftab",
                        "published_scope" => "global",
                        "product_type"=> "FixedPriceItem",                      
                        "images"=> $images_arr,
                        "variants"=> $variation_options_arr,
                        "options"=> $variation_arr_ready2
                      );
                $product = array("product" => $pr); 
                ini_set('memory_limit', '-1');
                $request = $api->rest('POST', '/admin/api/2019-04/products.json',$product);
                echo "<pre>";
                // print_r($product);
                print_r(json_decode($request)) ;
                echo "</pre>"; 
                echo "</br>";
        }
        echo "</pre>"; // THIS <pre> tag start from line # 55
        return;


// Query from database
        // $shops = DB::table('shops')->get();
        // print_r($shops);
        // return;


// Below code will print Shopify Store information
        // $shp = ShopifyApp::shop();
        // Log::info('This is the Shop Object: '.print_r($shp,true));
        // echo "<pre>";
        // print_r($shp);
        // return;
        ini_set('memory_limit', '-1');
        // $request = $api->rest('GET', '/admin/api/2019-04/orders.json');
        // echo "<pre>";
        // print_r($request);
        // echo "</pre>"; 
        // return;
        // return view("welcome");
    }

    public function get_amazon_products(){
        print_r("Hellow worod");
    }
    public function get_etsy_products(){
        return view('etsy');
    }
    public function action_get_etsy_products(Request $request)
    {
        // return redirect()->route('/etsy');
        $api = new BasicShopifyAPI();
        $api->setShop(ShopifyApp::shop()->shopify_domain);
        $api->setAccessToken(ShopifyApp::shop()->shopify_token);
        // $this->validate($request, [
        //             'file' => 'required|mimes:xls,xlsx'
        //     ]);
            $path = $request->file('file')->getRealPath();
            // $data = Excel::load($path)->get();
                // echo $path;
                $handle = fopen($path, "r");
                $header = true;
                $check = 0;
                while ($row = fgetcsv($handle, 1000, ",")) {
                    if ($header) {
                        $header = false;
                    } else {
                        $pr = array (
                            'title' => $row[0],
                            'body_html' => '<strong>'.$row[1].'</strong>',
                            'tags'=> $row[5],
                            "published_scope" => "global",
                            "template_suffix" => null,
                            'images' => array(
                                array(
                                    "src"=> $row[6]
                                  )
                                ),
                            "variants" => array(
                                    array(
                                        "price" => $row[2],
                                        "currency_code"=> $row[3], 
                                        "inventory_quantity" => $row[4],
                                    ),
                                ),
                            );
                            $product = array("product" => $pr);            
                            // print_r($product);
                            ini_set('memory_limit', '-1');
                            $request = $api->rest('POST', '/admin/api/2019-04/products.json',$product);
                            // echo "<pre>RESPONSE";
                            // print_r($request);
                            // echo "</pre>";
                            if($request->body){
                                $check = 1;
                            }
                           
                    }
                }    
            
            if($check==1){
                session()->flash('success','Imported successfully!');
            }
            else{
                session()->flash('error','Error while importing!');
            }
            return view('etsy');

        }
}