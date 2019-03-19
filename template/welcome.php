 <?php header("Location: https://webpurse.org/index.php/auth/login/"); exit();?>
<?php $this->load->view('header'); ?>

                    <table class="features-table">
					<thead>
						<tr>
							<td></td>
							<td>خريد</td>
							<td>فروش</td>
							<td>موجودي</td>
						</tr>
					</thead>				
					<tbody>
						<?php if($active['perfectmoney'] === 1){?>
						<tr>
							<td><img src="/assets/images/perfectmoney.png"><span>پرفکت ماني</span></td>
							<td><?php echo $buy_price['perfectmoney'];?> تومان</td>
							<td><?php echo $sell_price['perfectmoney'];?> تومان</td>
							<td><?php echo $available['perfectmoney'];?> دلار</td>
						</tr>
						<?php }?>
						<?php if($active['bitcoin'] === 1){?>
						<tr>
							<td><img src="/assets/images/bitcoin.png"><span>بيتکوين</span></td>
							<td><?php echo $buy_price['bitcoin'];?> تومان</td>
							<td><?php echo $sell_price['bitcoin'];?> تومان</td>
							<td><?php echo $available['bitcoin'];?> بيتکوين</td>
						</tr>
						<?php }?>
						<?php if($active['okpay'] === 1){?>
						<tr>
							<td><img src="/assets/images/okpay.png"><span>اوکي پي</span></td>
							<td><?php echo $buy_price['okpay'];?> تومان</td>
							<td><?php echo $sell_price['okpay'];?> تومان</td>
							<td><?php echo $available['okpay'];?> دلار</td>
						</tr>
						<?php }?>
						<?php if($active['paypal'] === 1){?>
						<tr>
							<td><img src="/assets/images/paypal.png"><span>پي پال</span></td>
							<td><?php echo $buy_price['paypal'];?> تومان</td>
							<td><?php echo $sell_price['paypal'];?> تومان</td>
							<td><?php echo $available['paypal'];?> دلار</td>
						</tr>
						<?php }?>
						<?php if($active['webmoney'] === 1){?>
						<tr>
							<td><img src="/assets/images/webmoney.png"><span>وب ماني</span></td>
							<td><?php echo $buy_price['webmoney'];?> تومان</td>
							<td><?php echo $sell_price['webmoney'];?> تومان</td>
							<td><?php echo $available['webmoney'];?> دلار</td>
						</tr>
						<?php }?>
						<?php if($active['skrill'] === 1){?>
						<tr>
							<td><img src="/assets/images/skrill.png"><span>اسکريل</span></td>
							<td><?php echo $buy_price['skrill'];?> تومان</td>
							<td><?php echo $sell_price['skrill'];?> تومان</td>
							<td><?php echo $available['skrill'];?> دلار</td>
						</tr>
						<?php }?>
						<?php if($active['btce'] === 1){?>
						<tr>
							<td><img src="/assets/images/btce.png"><span>بي تي سي - اي</span></td>
							<td><?php echo $buy_price['btce'];?> تومان</td>
							<td><?php echo $sell_price['btce'];?> تومان</td>
							<td><?php echo $available['btce'];?> دلار</td>
						</tr>
						<?php }?>
					</tbody>
					<tfoot>
						<tr>
							<td></td>
							<td><?php echo anchor('auth/exchange', 'خريد');?></td>
							<td><?php echo anchor('auth/exchange', 'فروش');?></td>
							<td><?php echo anchor('pages/contact', 'خريد');?></td>
						</tr>
					</tfoot>
				</table>

<?php $this->load->view('footer'); ?>