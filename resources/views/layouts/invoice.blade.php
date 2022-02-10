<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice </title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(5) {
				text-align: right;
                width: 20%;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
        @foreach ($order as $key)
            
       
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="6">
						<table>
							<tr>
								<td class="title">
									<img src="images/logo-black.png" style="height: 30px; width:auto; " />
								</td>

								<td style="text-align: right;">
                                    {{env('APP_NAME')}}<br>
                                    Website : {{url('/')}}<br>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="6">
						<table>
							<tr>
								<td>Order ID : {{$key->id}} <br>
									Order Date : {{date('d-m-Y', strtotime($key->created_at))}}<br />
                                    Name : {{$key->name}}, <br>
                                    Phone : {{$key->phone}} <br>
                                    Email : {{$key->email}} <br>
                                    Address : {{$key->address_street}}, {{$key->address_city}} - {{$key->address_pincode}}, {{$key->address_state}} <br>
                                    Payment Method: {{$key->payment_method}} ({{$key->payment_status}})
								</td>

							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
                    <td>Sr. No.</td>
					<td>Image</td>
					<td>Product</td>
					<td>Size</td>
                    <td>Quantity</td>
					<td>Price</td>
				</tr>

                
                @foreach (unserialize($key->product_id) as $item => $value)
                    @foreach ($product->where('id',$value[0]) as $data)
                        <tr>
                            <td>{{$item + 1}}</td>
                            <td><img src={{url($data->product_image_thumbnail)}} style="height: 50px; 50px;" alt="product-img"/></td>
                            <td>{{$data->product_name}}</td>
							<td>{{$value[3]}}</td>
                            <td>{{$value[1]}}</td>
                            <td class="text-right">Rs. {{number_format(($value[1] * $value[2]),2)}}</td>
                        </tr>
                    @endforeach
                @endforeach
				<tr class="item">
					<td colspan="5" style="text-align: right;">GST : </td>
					@if ($key->gst != 'Included')
					<td style="text-align: right;">Rs. {{number_format($key->gst,2)}}</td>
					@else 
					<td style="text-align: right;">{{$key->gst}}</td>
					@endif
				</tr>
				<tr class="item">
					<td colspan="5" style="text-align: right;">Shipping : </td>
					@if ($key->shipping != 'Free')
					<td style="text-align: right;">Rs. {{number_format($key->shipping,2)}}</td>
					@else 
					<td style="text-align: right;">{{$key->shipping}}</td>
					@endif
				</tr>
				@if (!is_null($key->coupon))
				<tr class="item">
					<td colspan="5" style="text-align: right;">Coupon code : </td>
					<td style="text-align: right;"> - Rs. {{number_format(($key->coupon),2)}}</td>
				</tr>
				@endif
                <tr class="item">
					<td colspan="5" style="text-align: right;">Total : </td>
					<td style="text-align: right;">Rs. {{number_format($key->total,2)}}</td>
				</tr>
				
			</table>
		</div>
        @endforeach

	</body>
</html>