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
                          <li class=""><a href="#">Home <span class="sr-only">(current)</span></a></li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Import<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                              <li class=""><a href="/amazon" class="disabled">Amazon Products</a></li>
                              <li class="active"><a href="/ebay">eBay Products</a></li>
                              <li><a href="/etsy">Etsy Products</a></li>
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

        <div class="">          
            <div class="">
                <div class="text-center">
                    <h3>Let's  get started with eBay Importer</h3>
                   <p style="">Import active, scheduled ans unsold items, variations, images and categories from your eBay Account</p>

                </div>
                <div class="text-center">
                    <a class="btn btn-primary" href=""  data-toggle="modal" data-target="#Modal">Start Importing from eBay</a>
                </div>
            </div>
        </div> 
        <div class="modal" id="Modal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Select what to import from eBay</h4>
                    </div>
                    <div class="modal-body">
                            <form class="form-horizontal">
                                    <fieldset>
                                      <div class="form-group">
                                        <div class="col-lg-10">
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="products" id="all_products" value="1" checked="">
                                              All Products
                                            </label>
                                          </div>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="products" id="scheduled_products" value="0">
                                              Active and Scheduled listing
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                    </fieldset>
                                  </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary">Get</button>
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
        window.mainPageTitle = 'Import eBay Products';
            ShopifyApp.ready(function() {
                ShopifyApp.Bar.initialize({
                    title: 'Import eBay Products'
                })
            });
    </script>
@endsection