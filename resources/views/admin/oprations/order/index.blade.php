<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

@include('admin.layouts.app')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container multivendors" id="container">

    @include('admin.layouts.sidebar')
    <div id="content" class="main-content wallet">

        <div class="allstd-page">
          

            <style>
                * {
                    font-size: 15px;
                }

                .filterable {
                    margin-top: 15px;
                }

                .filterable .panel-heading .pull-right {
                    margin-top: -20px;
                }

                .filterable .filters input[disabled] {
                    background-color: transparent;
                    border: none;
                    cursor: auto;
                    box-shadow: none;
                    padding: 0;
                    height: auto;
                }

                .filterable .filters input[disabled]::-webkit-input-placeholder {
                    color: #333;
                }

                .filterable .filters input[disablaed]::-moz-placeholder {
                    color: #333;
                }

                .filterable .filters input[disabled]:-ms-input-placeholder {
                    color: #333;
                }

                .border {
                    /* box-shadow: 1px 1px 9px black; */
                    height: 32px;
                    font-size: 17px;
                    border: 1px solid black;
                    border-radius: 3px;
                }
                .filterable input.form-control::placeholder {
                    color: #c3c3c3;
                    font-size: 13px;
                }
                .date::placeholder {
                    color: #c3c3c3;
                    font-size: 13px;
                    font-weight: 100;
                    padding-left: 8px;
                }
                input[type="date"]::-webkit-calendar-picker-indicator {
                    padding: 0px;
                    margin: 0px;
                    /* margin-top: 10px; */
                }

                .custom-inpt {
                    padding: 1px !important;
                }

                .date {
                    width: 100px;
                    color: black;
                    font-size: 13px;
                }
                .filterable .panel-heading {
                    padding: 20px;
                    background: #000;
                    border-color: #000;
                }
                .filterable table.table tbody tr td {
                    font-size: 15px;
                }
            </style>

            <div class="container ">
             <h2> Admin / Orders</h2>
                <!-- <hr> -->
                <div class="row pt-4">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h4 class="panel-title text-white">All Orders</h4>
                            <div class="pull-right">
                                <!-- <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button> -->
                            </div>
                        </div>
                        <table class="table" style="border: 1px solid #dadada;">
                            <thead>
                                <tr class="filters">
                                    <th><input type="text" class="form-control input border" placeholder="Sr No."></th>
                                    <th><input type="text" class="form-control input border" placeholder="Order Id"></th>
                                    <th><input type="text" class="form-control input border" placeholder="Payment Id"></th>
                                    <th><input type="text" class="form-control input border" placeholder="Rs."></th>
                                    <th><input type="text" class="form-control input border" placeholder="Address"></th>
                                    <th><input type="text" class="form-control input border" placeholder="Status"></th>
                                    <th>
                                        <div style="display:flex;"><input type="text" placeholder="To" onfocus="(this.type='date')" onblur="(this.type='text')" class="border date" onchange="data_filter()" id="to_date">
                                            <input type="text" placeholder="From" onfocus="(this.type='date')" onblur="(this.type='text')" class="border date" onchange="data_filter()" id="from_date">
                                        </div>
                                    </th>
                                </tr>

                            </thead>
                            <tbody id="table_data" style="text-align: center">
                                <?php $i = 1; ?>
                                @foreach($data['orders'] as $order)
                                <tr>
                                    <td class="border">{{$i++}}</td>
                                    <td class="border">{{$order->order_id}}</td>
                                    <td class="border">{{$order->razorpay_payment_id}}</td>
                                    <td class="border">{{$order->amount}}</td>
                                    <td class="border">{{$data['address'][$order->address_id]->name}}, {{$data['address'][$order->address_id]->address}} 
                                        ({{$data['address'][$order->address_id]->pincode}}) , {{$data['address'][$order->address_id]->state}} </td>
                                    <td class="border">{{$order->status}}</td>
                                    <td class="border">{{$order->created_at}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-cover">
                        {{ $data['orders']->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function data_filter() {
        var to_Date;
        var from_Date;
        to_Date = $('#to_date').val();
        from_Date = $('#from_date').val();

        $.ajax({
            url: 'order_by_date_ajax',
            type: 'post',
            data: {

                " _token": '{{csrf_token()}}',
                "to": to_Date,
                "from": from_Date
            },
            success: function(result) {

                $('#table_data').html(result);
                console.log(result);
            }


        });


    }

    /*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/
    $(document).ready(function() {
        $('.filterable .btn-filter').click(function() {
            var $panel = $(this).parents('.filterable'),
                $filters = $panel.find('.filters .input'),
                $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters .input').keyup(function(e) {
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9') return;
            /* Useful DOM data and selectors */
            var $input = $(this),
                inputContent = $input.val().toLowerCase(),
                $panel = $input.parents('.filterable'),
                column = $panel.find('.filters th').index($input.parents('th')),
                $table = $panel.find('.table'),
                $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function() {
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No result found</td></tr>'));
            }
        });
    });
</script>

@include('admin.layouts.footer')