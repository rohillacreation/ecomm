
@include('admin.layouts.app')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container multivendors" id="container">

@include('admin.layouts.sidebar')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content wallet">

        <div class="allstd-page dashboard">
            <h2 class="pb-4"> Order class</h2>

            

            <!-- <div class="row">
                <div class="col-lg-6 col-12 mt-4">
                    <div class="myChart3">
                        <h4 class="text-center">Number of sale</h4>
                        <canvas id="myChart3" aria-label="chart" role="img"></canvas>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mt-4">
                    <div class="myChart4">
                        <h4 class="text-center">Top Selling product</h4>
                    <canvas id="myChart4" aria-label="chart" role="img"></canvas>
                    </div>
                </div>
            </div> -->


            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="over-tab" data-toggle="tab" href="#over" role="tab" aria-controls="over" aria-selected="true">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="false">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ship-tab" data-toggle="tab" href="#ship" role="tab" aria-controls="ship" aria-selected="false">Shipments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ndr-tab" data-toggle="tab" href="#ndr" role="tab" aria-controls="ndr" aria-selected="false">NDR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="rto-tab" data-toggle="tab" href="#rto" role="tab" aria-controls="rto" aria-selected="false">RTO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="courier-tab" data-toggle="tab" href="#courier" role="tab" aria-controls="courier" aria-selected="false">Courier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="delay-tab" data-toggle="tab" href="#delay" role="tab" aria-controls="delay" aria-selected="false">Delays</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active mt-5" id="over" role="tabpanel" aria-labelledby="over-tab">
                    <!--body start -->

                    <div class="container mb-5">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('admin-assets/images/products.jpg')}}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('admin-assets/images/products.jpg')}}" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('admin-assets/images/products.jpg')}}" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div><!--carousal end -->
                    <div class="row">
                        <div class="col-md-4 col-4">
                            <div class="dash_card d-flex">
                                <h5><i class="fa fa-shopping-bag" aria-hidden="true"></i></h5>
                                <div class="cardcol pl-3">
                                    <p>Today's Order</p>
                                    <h5>0</h5>
                                    <p class="yest">Yesterday 0</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-8">
                            <div class="shipment">
                                <p>Shipments Details <span>Last 30 days</span></p>
                                <ul class="d-flex pl-2">
                                    <li><span>29</span><br>Total shipment</li>
                                    <li><span>29</span><br>Pickup Pending</li>
                                    <li><span>29</span><br>In-Transit</li>
                                    <li><span>29</span><br>Delivered</li>
                                    <li><span>29</span><br>NDR Pending</li>
                                    <li><span>29</span><br>RTO</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end row-->
                    <div class="row pt-4 pb-4">
                        <div class="col-md-4 col-4">
                            <div class="dash_card ndr d-flex" style="background: #05a605;">
                                <h5><i class="fa fa-money text-black" aria-hidden="true"></i></h5>
                                <div class="cardcol pl-3">
                                    <p>Today's Revenue</p>
                                    <h5> <strong>₹</strong>0</h5>
                                    <p class="yest">Yesterday  ₹0</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-8">
                            <div class="shipment ndr bg-white">
                                <p>NDR Details <span>Last 30 days</span></p>
                                <ul class="d-flex pl-4">
                                    <li><span>29</span><br>Total NDR</li>
                                    <li><span>29</span><br>Your Request</li>
                                    <li><span>29</span><br>Buyer Request</li>
                                    <li><span>29</span><br>NDR Delivered</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end row-->
                    <div class="row">
                        <div class="col-md-4 col-4">
                            <div class="dash_card cod d-flex bg-white">
                                <h5><i class="fa fa-truck" aria-hidden="true"></i></h5>
                                <div class="cardcol pl-3">
                                    <p>Average Shipping Cost</p>
                                    <p class="cost"> <b> ₹</b>454</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-8">
                            <div class="shipment cod bg-white">
                                <p>COD Status</p>
                                <ul class="d-flex pl-5">
                                    <li><span>₹1.5L</span><br>Last 30 days</li>
                                    <li><span>₹0</span><br>Courier </li>
                                    <li><span>₹0</span><br>Pickup </li>
                                    <li><span>₹5.9k</span><br> Delivery</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end row-->
                    <div class="circle_chart pt-5">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div class="canvas-body">
                                    <h4>Courier Split</h4>
                                    <div class="canvas">
                                        <canvas id="myChart" height="300" width="300" aria-label="chart" role="img"></canvas>
                                        <div class="canvas-text">
                                            <div class="canvas-circle canvas-pink"></div>
                                            <div>Total  products</div>
                                        </div>
                                        <div class="canvas-text">
                                            <div class="canvas-circle canvas-green"></div>
                                            <div> published products</div>
                                        </div>
                                        <div class="canvas-text">
                                            <div class="canvas-circle canvas-blue"></div>
                                            <div> Unpublished products</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="canvas-body">
                                    <h4>Overall Shipment Status</h4>
                                    <div class="canvas">
                                        <canvas id="myChart2" height="300" width="300" aria-label="chart" role="img"></canvas>
                                            <?php $i=0; ?>
                                        @foreach($data['category'] as $canvas)
                                        <div class="canvas-text">
                                            <div class="canvas-circle {{$data['canvas_color'][$i++]}}"></div>
                                            <div>{{$canvas['name']}}</div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="canvas-body">
                                    <h4>Deiver Perfromance</h4>
                                    <div class="canvas">
                                        <canvas id="myChart4" height="300" width="300" aria-label="chart" role="img"></canvas>
                                        <div class="canvas-text">
                                            <div class="canvas-circle canvas-pink"></div>
                                            <div>Total  products</div>
                                        </div>
                                        <div class="canvas-text">
                                            <div class="canvas-circle canvas-green"></div>
                                            <div> published products</div>
                                        </div>
                                        <div class="canvas-text">
                                            <div class="canvas-circle canvas-red"></div>
                                            <div> published products</div>
                                        </div>
                                        <div class="canvas-text">
                                            <div class="canvas-circle canvas-blue"></div>
                                            <div> Unpublished products</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end circle chart -->
                    <div class="map_zone pt-5">
                        <div class="row">
                            <div class="col-md-4 col-6">
                                <div class="zone">
                                                       
                                    <div id="visualization"></div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="zone">
                                    <p>Shipments - Zone Distribution <span style="font-size: 12px;padding-top: 2px;">Last 30 Days</span></p>
                                    <ul class="pl-0">
                                        <li><p><span class="grey"></span>Zone A <span>0</span></p></li>
                                        <li><p><span class="green"></span>Zone B <span>0</span></p></li>
                                        <li><p><span class="yellow"></span>Zone C <span>0</span></p></li>
                                        <li><p><span class="red"></span>Zone D <span>0</span></p></li>
                                        <li><p><span class="blue"></span>Zone E <span>0</span></p></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="zone">
                                    <p>Revenue</p>
                                    <ul class="pl-0">
                                        <li><p>Lifetime<span>₹20.0</span></p></li>
                                        <li><p>This Week<span>₹20.0</span></p></li>
                                        <li><p>This Months<span>₹20.0</span></p></li>
                                        <li><p>This Quarter <span>₹20.0</span></p></li>
                                        <li><p>This Year <span>₹20.0</span></p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!---end zone area -->
                    <div class="table_zone mt-5">
                        <p>Shipments - Zone Distribution <span style="float:right;">Last 30 Days</span></p>
                        <table class="table bg-white custab mt-5">
                        <thead class="text-center">
                            <tr>
                                <th>Courier Name</th>
                                <th>Pickup Unscheduled</th>
                                <th>Pickup Scheduled</th>
                                <th>In-Transit</th>
                                <th>Delivered</th>
                                <th>NDR Raised</th>
                                <th>NDR Delivered</th>
                                <th>NDR Pending</th>
                                <th>RTO</th>
                                <th>Damaged</th>
                                <th>Total Shipment</th>
                            </tr>
                        </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>Delivery Surface 1kgs</td>
                                    <td>6</td>
                                    <td>9</td>
                                    <td>0</td>
                                    <td> 1</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>5</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>Delivery Surface 1kgs</td>
                                    <td>6</td>
                                    <td>9</td>
                                    <td>0</td>
                                    <td> 1</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>5</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>Delivery Surface 1kgs</td>
                                    <td>6</td>
                                    <td>9</td>
                                    <td>0</td>
                                    <td> 1</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>5</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>Delivery Surface 1kgs</td>
                                    <td>6</td>
                                    <td>9</td>
                                    <td>0</td>
                                    <td> 1</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>5</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>Delivery Surface 1kgs</td>
                                    <td>6</td>
                                    <td>9</td>
                                    <td>0</td>
                                    <td> 1</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>5</td>
                                    <td>3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- table end-->
                </div><!--overview end-->
                <div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
                    ..b.
                </div><!--order end-->
                <div class="tab-pane fade" id="ship" role="tabpanel" aria-labelledby="ship-tab">
                    .c.
                </div><!--shipments end-->
                <div class="tab-pane fade" id="ndr" role="tabpanel" aria-labelledby="ndr-tab">
                    ..d.
                </div><!--ndr end-->
                <div class="tab-pane fade" id="rto" role="tabpanel" aria-labelledby="rto-tab">
                    ..e.
                </div><!--rto end-->
                <div class="tab-pane fade" id="courier" role="tabpanel" aria-labelledby="courier-tab">
                    ..f.
                </div><!--courier end-->
                <div class="tab-pane fade" id="delay" role="tabpanel" aria-labelledby="delay-tab">
                    ..g.
                </div><!--delays end-->

            </div>



            


        </div>


    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->



<!-- <script>
google.load("visualization", "1", { packages: ["geochart"] });
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
var data = google.visualization.arrayToDataTable([
["State Code", "State", "Temperature"],
["IN-UP", "Uttar Pradesh", 33],
["IN-MH", "Maharashtra", 32],
["IN-BR", "Bihar", 31],
["IN-WB", "West Bengal", 32],
["IN-MP", "Madhya Pradesh", 30],
["IN-TN", "Tamil Nadu", 33],
["IN-RJ", "Rajasthan", 33],
["IN-KA", "Karnataka", 29],
["IN-GJ", "Gujarat", 34],
["IN-AP", "Andhra Pradesh", 32],
["IN-OR", "Orissa", 33],
["IN-TG", "Telangana", 33],
["IN-KL", "Kerala", 31],
["IN-JH", "Jharkhand", 29],
["IN-AS", "Assam", 28],
["IN-PB", "Punjab", 30],
["IN-CT", "Chhattisgarh", 33],
["IN-HR", "Haryana", 30],
["IN-JK", "Jammu and Kashmir", 20],
["IN-UT", "Uttarakhand", 28],
["IN-HP", "Himachal Pradesh", 17],
["IN-TR", "Tripura", 31],
["IN-ML", "Meghalaya", 21],
["IN-MN", "Manipur", 22],
["IN-NL", "Nagaland", 22],
["IN-GA", "Goa", 32],
["IN-AR", "Arunachal Pradesh", 33],
["IN-MZ", "Mizoram", 23],
["IN-SK", "Sikkim", 24],
["IN-DL", "Delhi", 31],
["IN-PY", "Puducherry", 33],
["IN-CH", "Chandigarh", 30],
["IN-AN", "Andaman and Nicobar Islands", 30],
["IN-DN", "Dadra and Nagar Haveli", 30],
["IN-DD", "Daman and Diu", 29],
["IN-LD", "Lakshadweep", 31]
]);

var opts = {
region: "IN",
domain: "IN",
displayMode: "regions",
colorAxis: { colors: ["#e5ef88", "#d4b114", "#e85a03"] },
resolution: "provinces",
/*backgroundColor: '#81d4fa',*/
/*datalessRegionColor: '#81d4fa',*/
defaultColor: "#f5f5f5",
width: 640,
height: 480
};
var geochart = new google.visualization.GeoChart(
document.getElementById("visualization")
);
geochart.draw(data, opts);
}
</script>
<script type='text/javascript' src='https://www.google.com/jsapi'></script> -->

<script src="{{asset('admin-assets/js/chart-min.js')}}"></script>
<script src="{{asset('admin-assets/js/chart.js')}}"></script>
@include('admin.layouts.footer') 
