
@include('staff.layouts.app')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container multivendors" id="container">

    @include('staff.layouts.sidebar')
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content wallet">

            <div class="allstd-page">
                <h2> Order class</h2>

                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="box4" style="display: flex;">
                            <div class="col-6 mb-3">
                                <div class="total-customer">
                                    <span>Total</span><br />
                                    <span>Customer</span>
                                    <h2>{{$data['user_count']}}</h2>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                    <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                        d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="col-6 mb-3">
                
                                <div class="total-order">
                                    <span>Total</span><br />
                                    <span>Order</span>
                                    <h2>{{$data['user_count']}}</h2>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                    <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                        d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                                    </path>
                                </svg>
                            </div>
                
                        </div>
                        <div class="box4" style="display: flex;">
                            <div class="col-6 mb-3">
                                <div class="total-product-category">
                                    <span>Total</span><br />
                                    <span>Product Category</span>
                                    <h2>{{$data['category_count']}}</h2>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                    <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                        d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="col-6 mb-3">
                
                                <div class="total-product-brand">
                                    <span>Total</span><br />
                                    <span>Product Brand</span>
                                    <h2>{{$data['brand_count']}}</h2>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                    <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                                        d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                                    </path>
                                </svg>
                            </div>
                
                        </div>
                
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="canvas-body">
                                    <h4>Products</h4>
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
                            <div class="col-lg-6 col-sm-6">
                                <div class="canvas-body">
                                    <h4>Category Products</h4>
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
                        </div>
                
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-12 mt-4">
                        <div class="myChart3">
                            <h4 class="text-center">Number of sale</h4>
                            <canvas id="myChart3" aria-label="chart" role="img"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 mt-4">
                        <div class="myChart4">
                            <h4 class="text-center">Top selling categories</h4>
                        <canvas id="myChart4" aria-label="chart" role="img"></canvas>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->
<script src="{{asset('admin-assets/js/chart-min.js')}}"></script>
<script src="{{asset('admin-assets/js/chart.js')}}"></script>
@include('staff.layouts.footer') 
