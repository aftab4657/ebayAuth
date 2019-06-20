<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Products Importer</title>
        <link rel="stylesheet" href="/css/app.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
            #shop-name{
                position: fixed;
                left: 5px;
                bottom: 0;
            }


        </style>
    </head>
    <body>

            <nav class="navbar navbar-default">
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        
                      </div>
                  
                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                          <li class=""><a href="/">Home <span class="sr-only">(current)</span></a></li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Import<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                              <li class="disabled"><a href="/amazon" class="disabled">Amazon Products</a></li>
                              <li class=""><a href="/ebay">eBay Products</a></li>
                              <li class=""><a href="/etsy">Etsy Products</a></li>
                            </ul>
                          </li>
                          <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Setting<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li class=""><a href="manage_products" class="disabled">Manage Products</a></li>
                                  <li class=""><a href="/link_ebay">Link eBay</a></li>
                                  <li class=""><a href="/app_setting">App Setting</a></li>
                                </ul>
                          </li>
                          <li class="/contact"><a href="/">Contact us</a></li>
                        </ul>
                      </div>
                    </div>
                  </nav>

        <div class="container">          
            <div class="row">
                <div class="col-md-8">
                        <div class="form-group">
                                <label for="select" class="col-lg-2 control-label">Marketplace</label>
                                <div class="col-lg-10">
                                  <select class="form-control" id="select">
                                            <option label="ebay.com" value="string:0" selected="selected">ebay.com</option>
                                            <option label="ebay.ca" value="string:2">ebay.ca</option>
                                            <option label="ebay.co.uk" value="string:3">ebay.co.uk</option>
                                            <option label="ebay.com.au" value="string:15">ebay.com.au</option>
                                            <option label="ebay.at" value="string:16">ebay.at</option>
                                            <option label="ebay.be French" value="string:23">ebay.be French</option>
                                            <option label="ebay.fr" value="string:71">ebay.fr</option>
                                            <option label="ebay.de" value="string:77">ebay.de</option>
                                            <option label="ebay.it" value="string:101">ebay.it</option>
                                            <option label="webservices.amazon.it" value="string:123">webservices.amazon.it</option>
                                            <option label="ebay.nl" value="string:146">ebay.nl</option>
                                            <option label="ebay.es" value="string:186">ebay.es</option>
                                            <option label="ebay.ch" value="string:193">ebay.ch</option>
                                            <option label="ebay.com.hk" value="string:201">ebay.com.hk</option>
                                            <option label="ebay.in" value="string:203">ebay.in</option>
                                            <option label="ebay.ie" value="string:205">ebay.ie</option>
                                            <option label="ebay.com.my" value="string:207">ebay.com.my</option>
                                            <option label="ebay.ca French" value="string:210">ebay.ca French</option>
                                            <option label="ebay.ph" value="string:211">ebay.ph</option>
                                            <option label="ebay.pl" value="string:212">ebay.pl</option>
                                            <option label="ebay.com.sg" value="string:216">ebay.com.sg</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                          <a class="btn btn-primary" href="https://auth.sandbox.ebay.com/oauth2/authorize?client_id=ShahidGh-SellingS-SBX-379703086-ae40cff8&response_type=code&redirect_uri=Shahid_Ghafoor-ShahidGh-Sellin-ufdoqx&scope=https://api.ebay.com/oauth/api_scope https://api.ebay.com/oauth/api_scope/buy.order.readonly https://api.ebay.com/oauth/api_scope/buy.guest.order https://api.ebay.com/oauth/api_scope/sell.marketing.readonly https://api.ebay.com/oauth/api_scope/sell.marketing https://api.ebay.com/oauth/api_scope/sell.inventory.readonly https://api.ebay.com/oauth/api_scope/sell.inventory https://api.ebay.com/oauth/api_scope/sell.account.readonly https://api.ebay.com/oauth/api_scope/sell.account https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly https://api.ebay.com/oauth/api_scope/sell.fulfillment https://api.ebay.com/oauth/api_scope/sell.analytics.readonly https://api.ebay.com/oauth/api_scope/sell.marketplace.insights.readonly https://api.ebay.com/oauth/api_scope/commerce.catalog.readonly https://api.ebay.com/oauth/api_scope/buy.shopping.cart https://api.ebay.com/oauth/api_scope/buy.offer.auction https://api.ebay.com/oauth/api_scope/commerce.identity.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.email.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.phone.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.address.readonly https://api.ebay.com/oauth/api_scope/commerce.identity.name.readonly https://api.ebay.com/oauth/api_scope/sell.finances.readonly">
                                            Link <i>eBay</i> Store
                                          </a>
                                          
                                        </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>     
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
@extends('shopify-app::layouts.default')

@section('content')
    <p id="shop-name">Shop Name: {{ ShopifyApp::shop()->shopify_domain }}</p>
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        // ESDK page and bar title
        window.mainPageTitle = 'Link eBay Account';
            ShopifyApp.ready(function() {
                ShopifyApp.Bar.initialize({
                    title: 'Link eBay Account'
                })
            });
    </script>
@endsection