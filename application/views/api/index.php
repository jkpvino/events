<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html; charset=windows-1252" http-equiv="Content-Type">
    <title>  Api list</title>
    <title> API Documentation</title>

    <link type="text/css" rel="stylesheet" href="assests/api/css/mobistyle.css">
</head>   
<body>
<?php 
    $oauth = 'jkprovab';
    $api_key = 'provab@123@';    
?>
                                 




    <h1 id="title"> API </h1>
    <div id="controls">
        <ul>
            <li><a href="#" id="toggle-endpoints">Toggle All Endpoints</a></li>
            <li><a href="#" id="toggle-methods">Toggle All Methods</a></li>
         </ul>
    </div>


    <ul class="container">
        <!-- Customers -->

        <li class="endpoint expanded">
            <h3 class="title"><span class="name"> Customers  </span>
                <ul class="actions">
                    <li class="list-methods"><a href="#">List Methods</a></li>
                    <li class="expand-methods"><a href="#">Expand Methods</a></li>
                </ul>
            </h3>
            <ul style="display: block;" class="methods hidden">
                
                <!-- Customer Registration -->
                <li class="method post ">
                    <div class="title"><span class="http-method">POST</span><span class="name"> Customer Registration </span><span class="uri">customer/account/create</span></div>
                    <form style="display: none;" id="register_tab" class="hidden">
                    <input type="hidden" value="POST" name="httpMethod">
                    <input type="hidden" value="" name="oauth">
                    <input type="hidden" value="customer/account/create" name="methodUri" >
                    <span class="description"> Customer Registration </span><br><br>
                        <div id="param1"></div>
                        <table class="parameters">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Parameter</th>
                                    <th>Value</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr class="required">
                                    <td class="name">Oauth Token</td>
                                    <td class="para">oauth</td>
                                    <td class="parameter"><input placeholder="required" value="" name="oauth"><input type="hidden" value="query" name="locations[oauth]"></td>
                                    <td class="type">Numeric</td>
                                    <td class="description"><p>Token</p></td>
                                </tr>

                                <tr class="required">
                                    <td class="name">First Name</td>
                                    <td class="para">firstname</td>
                                    <td class="parameter"><input placeholder="required" value="vinoth" name="firstname"><input type="hidden" value="vinoth" name="locations[firstname]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>( Eg : First Name)</p></td>
                                </tr>

                                <tr class="required">
                                    <td class="name">Last Name</td>
                                    <td class="para">lastname</td>
                                    <td class="parameter"><input placeholder="required" value="" name="lastname"><input type="hidden" value="query" name="locations[lastname]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>( Eg : Last Name)</p></td>
                                </tr>

                                <tr class="required">
                                    <td class="name">Email</td>
                                    <td class="para">email</td>
                                    <td class="parameter"><input placeholder="required" type="text" name="email"><input type="hidden"  name="locations[email]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>( Eg : test@gmail.com )</p></td>
                                </tr>

                                <tr class="required">
                                    <td class="name">Password</td>
                                    <td class="para">password</td>
                                    <td class="parameter"><input placeholder="required" type="password" value="" name="password"><input type="hidden" name="locations[password]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>( Eg : ******* )</p></td>
                                </tr>

                                <tr class="required">
                                    <td class="name">PhoneNo</td>
                                    <td class="para">phone_no</td>
                                    <td class="parameter"><input placeholder="optional" value="" name="telephone"><input type="hidden" value="query" name="locations[telephone]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>( Eg : Phone No)</p></td>
                                </tr>
                                <tr class="required">
                                    <td class="name">Gender</td>
                                    <td class="para">gender</td>
                                    <td class="parameter"><input placeholder="optional" value="1" name="gender"><input type="hidden" value="query" name="locations[gender]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>(0 => Female or 1 => Male)</p></td>
                                </tr> 
                                <tr class="required">
                                    <td class="name">Status</td>
                                    <td class="para">status</td>
                                    <td class="parameter"><input placeholder="optional" value="10" name="status"><input type="hidden" value="query" name="locations[status]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>(10 => Active 20 => Hold, 30=>Blocked , 40=> Inactive)</p></td>
                                </tr>  
                                <tr class="required">
                                    <td class="name">Country Code</td>
                                    <td class="para">country_code</td>
                                    <td class="parameter"><input placeholder="optional" value="IN" name="country_code"><input type="hidden" value="query" name="locations[country_code]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>(IN => India)</p></td>
                                </tr>                               
                            </tbody>
                        </table>
                        <input type="submit" value="Try it!" id="apis" class="button">

                        <pre>      
                            <div id="my_register_tab"> </div> 
                        </pre>
                    </form>
                </li> 
                <!-- Customer Login -->
                <li class="method post ">
                    <div class="title"><span class="http-method">POST</span><span class="name"> Customer Login </span><span class="uri">/mobiapp/customers/Login</span></div>
                    <form style="display: none;" id="banner_info" class="hidden">
                    <input type="hidden" value="POST" name="httpMethod">
                    <input type="hidden" value="" name="oauth">
                    <input type="hidden" value="/mobiapp/customers/login" name="methodUri" ><span class="description"> Customer Login </span><br><br>
                        <div id="param1"></div>
                        <table class="parameters">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Parameter</th>
                                    <th>Value</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="required">
                                    <td class="name">Api user</td>
                                    <td class="para">oauth</td>
                                    <td class="parameter"><input placeholder="required" value="" name="oauth"><input type="hidden" value="query" name="locations[oauth]"></td>
                                    <td class="type">Numeric</td>
                                    <td class="description"><p>Api user</p></td>
                                </tr>
                                <tr class="required">
                                    <td class="name">Api Key</td>
                                    <td class="para">api_key</td>
                                    <td class="parameter"><input placeholder="required" type="password" value="<?= $api_key ?>" name="api_key"><input type="hidden" value="query" name="locations[api_key]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>Api key</p></td>
                                </tr>

                                <tr class="required">
                                    <td class="name">Email</td>
                                    <td class="para">email</td>
                                    <td class="parameter"><input placeholder="required" value="" name="email"><input type="hidden" value="query" name="locations[email]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>( Eg : test@gmail.com )</p></td>
                                </tr>

                                <tr class="required">
                                    <td class="name">Password</td>
                                    <td class="para">password</td>
                                    <td class="parameter"><input placeholder="required" type="password" value="" name="password"><input type="hidden" value="query" name="locations[password]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>( Eg : ******* )</p></td>
                                </tr>
                                 
                                
                               
                            </tbody>

                        </table>
                        <input type="submit" value="Try it!" id="apis" class="button">

                        <pre>      
                            <div id="my_banner_info"> </div> 
                        </pre>
                    </form>
                </li>                   
                <!-- Get Customers List -->
                <li class="method post ">
                    <div class="title"><span class="http-method">POST</span><span class="name"> Customers List </span><span class="uri">/mobiapp/customers/GetCustomerList</span></div>
                    <form style="display: none;" id="customerlists" class="hidden">
                    <input type="hidden" value="POST" name="httpMethod">
                    <input type="hidden" value="" name="oauth">
                    <input type="hidden" value="/mobiapp/customers/getCustomerList" name="methodUri" ><span class="description"> Customers List </span><br><br>
                        <div id="param1"></div>
                        <table class="parameters">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Parameter</th>
                                    <th>Value</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="required">
                                    <td class="name">Api user</td>
                                    <td class="para">oauth</td>
                                    <td class="parameter"><input placeholder="required" value="" name="oauth"><input type="hidden" value="query" name="locations[oauth]"></td>
                                    <td class="type">Numeric</td>
                                    <td class="description"><p>Api user</p></td>
                                </tr>
                                <tr class="required">
                                    <td class="name">Api Key</td>
                                    <td class="para">api_key</td>
                                    <td class="parameter"><input placeholder="required" type="password" value="<?= $api_key ?>" name="api_key"><input type="hidden" value="query" name="locations[api_key]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>Api key</p></td>
                                </tr>

                            </tbody>
                        </table>
                        <input type="submit" value="Try it!" id="apis" class="button">
                        <pre>      
                            <div id="my_customerlists"> </div> 
                        </pre>
                    </form>
                </li>
                
            </ul>
        </li>
        <!-- Products -->
        <li class="endpoint expanded" style="">
            <h3 class="title"><span class="name">Products</span>
                <ul class="actions">
                    <li class="list-methods"><a href="#">List Methods</a></li>
                    <li class="expand-methods"><a href="#">Expand Methods</a></li>
                </ul>
            </h3>
            <ul style="display: block;" class="methods hidden"> 

                <!-- Get Special Product Collection -->
                <li class="method post ">
                    <div class="title"><span class="http-method">POST</span><span class="name">Get Products Collection</span><span class="uri">/mobiapp/products/ProductsCollection</span></div>

                    <form style="display: none;" id="pro_coll" class="hidden"><input type="hidden" value="POST" name="httpMethod"><input type="hidden" value="" name="oauth"><input type="hidden" value="/mobiapp/products/ProductsCollection" name="methodUri"><span class="description">To get product information. </span><br><br>
                        <div id="param1"></div>
                        <table class="parameters">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Parameter</th>
                                    <th>Value</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="required">
                                    <td class="name">Api user</td>
                                    <td class="para">oauth</td>
                                    <td class="parameter"><input placeholder="required" value="" name="oauth"><input type="hidden" value="query" name="locations[oauth]"></td>
                                    <td class="type">Numeric</td>
                                    <td class="description"><p>Api user</p></td>
                                </tr>
                                <tr class="required">
                                    <td class="name">Api Key</td>
                                    <td class="para">api_key</td>
                                    <td class="parameter"><input placeholder="required" type="password" value="<?= $api_key ?>" name="api_key"><input type="hidden" value="query" name="locations[api_key]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>Api key</p></td>
                                </tr>

                                <tr class="required">
                                    <td class="name">Type</td>
                                    <td class="para">type</td>
                                    <td class="parameter"><input placeholder="required" value="" name="type"><input type="hidden" value="query" name="locations[type]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>(latest,best_sell,most_viewed,featured)</p></td>
                                </tr>
                                 <tr class="required">
                                    <td class="name">Limit</td>
                                    <td class="para">Limit</td>
                                    <td class="parameter"><input placeholder="optional" value="" name="limit"><input type="hidden" value="query" name="locations[limit]"></td>
                                    <td class="type">Numeric</td>
                                    <td class="description"><p>Default Limit 5</p></td>
                                </tr>
                                
                               
                            </tbody>

                        </table>
                        <input type="submit" value="Try it!" id="apis" class="button">

                        <pre>      
                            <div id="my_pro_coll"></div> 
                        </pre>
                    </form>
                </li>
              
                <!-- Get Product Collection By Search -->
                <li class="method post ">
                    <div class="title"><span class="http-method">POST</span><span class="name">Get Products by search</span><span class="uri">/mobiapp/products/ProductInfoBySearch</span></div>
                    <form style="display: none;" id="cat_id" class="hidden"><input type="hidden" value="POST" name="httpMethod"><input type="hidden" value="" name="oauth"><input type="hidden" value="/mobiapp/products/ProductInfoBySearch" name="methodUri"><span class="description">To get product information. </span><br><br>
                        <div id="param1"></div>
                        <table class="parameters">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Parameter</th>
                                    <th>Value</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="required">
                                    <td class="name">Api user</td>
                                    <td class="para">oauth</td>
                                    <td class="parameter"><input placeholder="required" value="" name="oauth"><input type="hidden" value="query" name="locations[oauth]"></td>
                                    <td class="type">Numeric</td>
                                    <td class="description"><p>Api user</p></td>
                                </tr>
                                <tr class="required">
                                    <td class="name">Api Key</td>
                                    <td class="para">api_key</td>
                                    <td class="parameter"><input placeholder="required" type="password" value="<?= $api_key ?>" name="api_key"><input type="hidden" value="query" name="locations[api_key]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>Api key</p></td>
                                </tr>
                                <tr class="required">
                                    <td class="name">Product Text</td>
                                    <td class="para">search_text</td>
                                    <td class="parameter"><input placeholder="required" value="" name="search_text"><input type="hidden" value="query" name="locations[search_text]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>Product text</p></td>
                                </tr>
                                 <tr class="required">
                                    <td class="name">Page Number</td>
                                    <td class="para">page</td>
                                    <td class="parameter"><input placeholder="optional" value="" name="page"><input type="hidden" value="query" name="locations[page]"></td>
                                    <td class="type">Numeric</td>                                <td class="description"><p>Default Page Number 1.</p></td>
                                </tr>
                                 <tr class="required">
                                    <td class="name">Product Limit</td>
                                    <td class="para">perpage</td>
                                    <td class="parameter"><input placeholder="optional" value="" name="perpage"><input type="hidden" value="query" name="locations[perpage]"></td>
                                    <td class="type">Numeric</td>                                
                                    <td class="description"><p>Default Product Limit 20.</p></td>
                                </tr>
                                <!--  <tr class="required">
                                    <td class="name">Type</td>
                                    <td class="para">type</td>
                                    <td class="parameter"><input placeholder="required" value="" name="type"><input type="hidden" value="query" name="locations[type]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>(simple,configurable,bundle,virtual,Downloadable,grouped)</p></td>
                                </tr> -->
                               
                            </tbody>

                        </table>
                        <input type="submit" value="Try it!" id="apis" class="button">

                        <pre>      
                            <div id="my_cat_id"></div> 
                        </pre>
                    </form>
                </li>















                <!-- Get Product Collection By Category -->
                <!-- <li class="method post ">
                    <div class="title"><span class="http-method">POST</span><span class="name">Get Products By Category</span><span class="uri">/mobiapp/products/productListByCategory</span></div>
                    <form style="display: none;" id="catg_id" class="hidden"><input type="hidden" value="POST" name="httpMethod"><input type="hidden" value="" name="oauth"><input type="hidden" value="mobiapp/products/productListByCategory" name="methodUri"><span class="description"> To get product Lists. </span><br><br>
                        <div id="param1"></div>
                        <table class="parameters">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Parameter</th>
                                    <th>Value</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="required">
                                    <td class="name">Api user</td>
                                    <td class="para">oauth</td>
                                    <td class="parameter"><input placeholder="required" value="" name="oauth"><input type="hidden" value="query" name="locations[oauth]"></td>
                                    <td class="type">Numeric</td>
                                    <td class="description"><p>Api user</p></td>
                                </tr>
                                <tr class="required">
                                    <td class="name">Api Key</td>
                                    <td class="para">api_key</td>
                                    <td class="parameter"><input placeholder="required" type="password" value="<?= $api_key ?>" name="api_key"><input type="hidden" value="query" name="locations[api_key]"></td>
                                    <td class="type">text</td>
                                    <td class="description"><p>Api key</p></td>
                                </tr>
                                <tr class="required">
                                    <td class="name">catgeory id</td>
                                    <td class="para">cat_id</td>
                                    <td class="parameter"><input placeholder="required" value="" name="cat_id"><input type="hidden" value="query" name="locations[cat_id]"></td>
                                    <td class="type">Numeric With comma seperated</td>
                                    <td class="description"><p>Eg: 2,3 </p></td>
                                </tr>
                                <tr class="required">
                                    <td class="name">Sort by</td>
                                    <td class="para">sort_by</td>
                                    <td class="parameter"><input placeholder="optional" value="" name="sort_by"><input type="hidden" value="query" name="locations[sort_by]"></td>
                                    <td class="type">numeric</td>
                                    <td class="description"><p>Eg: Price</p></td>
                                </tr>
                                <tr class="required">
                                    <td class="name">sort type</td>
                                    <td class="para">sort_type</td>
                                    <td class="parameter"><input placeholder="optional" value="" name="sort_type"><input type="hidden" value="query" name="locations[sort_type]"></td>
                                    <td class="type">numeric</td>
                                    <td class="description"><p>(ASC,DESC)</p></td>
                                </tr>
                                <tr class="required">
                                    <td class="name">Page Number</td>
                                    <td class="para">page</td>
                                    <td class="parameter"><input placeholder="optional" value="" name="page"><input type="hidden" value="query" name="locations[page]"></td>
                                    <td class="type">Numeric</td>                                <td class="description"><p>Eg : 1 (Default Page Number 1).</p></td>
                                </tr>
                                <tr class="required">
                                    <td class="name">Product Limit</td>
                                    <td class="para">perpage</td>
                                    <td class="parameter"><input placeholder="optional" value="" name="perpage"><input type="hidden" value="query" name="locations[perpage]"></td>
                                    <td class="type">Numeric</td>                                
                                    <td class="description"><p>Default Product Limit 20.</p></td>
                                </tr>
                            </tbody>

                        </table>
                        <input type="submit" value="Try it!" id="apis">

                        <pre>      
                            <div id="my_catg_id"></div> 
                        </pre>
                    </form>
                </li> -->







            </ul> 
        </li>             
    </ul>

<script src="assests/api/js/jquery.js"></script>
<script src="assests/api/js/script.js"></script>
<script type="text/javascript">
    function myReturnFunc(arg){
        $('#achievement_image').val(arg);
    }   
    $(document).ready(function() {                
        $('form').on('submit', function() {
            var $form = $(this),
            url = $form.attr('id');      
            var methodtype = $(this).children('input[name=httpMethod]').val();
            var methoduri = $(this).children('input[name=methodUri]').val();
            $("#message").html("&lt;span class='error'&gt;API Request...&lt;/span&gt;");
            var siteurl = "<?php echo base_url(); ?>";
            var realpath = siteurl + methoduri + '/';
            if (methodtype == 'DELETE') {
                realpath = realpath + '?' + $(this).serialize();
            }

            $.ajax({
                type: methodtype, 
                url: realpath, // proper url to your "store-address.php" file
                data: $(this).serialize(),
                success: function(msg) {
                    var type_msg = jQuery.type(msg);
                    if (type_msg == 'object' || type_msg == 'array') {
                        var msg1 = JSON.stringify(msg);
                        $('#my_' + url).text(msg1);
                    }else {
                        $('#my_' + url).text(msg);
                    }
                }
            });
            return false;
        });
    });
</script>
</body>
</html>