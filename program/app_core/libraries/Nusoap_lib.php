<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Nusoap_lib
{
	function Nusoap_lib()
	{
		require_once(APPPATH.'libraries/nusoap/nusoap.php');
	}
	
	function response_message($number)
	{
		switch ($number) {
			case "0":
				$err = "تراكنش با موفقيت انجام شد";
				break;
			case "11":
				$err = "شماره كارت نامعتبر است ";
				break;
			case "12":
				$err = "موجودي كافي نيست ";
				break;
			case "13":
				$err = "رمز نادرست است ";
				break;
			case "14":
				$err = "تعداد دفعات وارد كردن رمز بيش از حد مجاز است ";
				break;
			case "15":
				$err = "كارت نامعتبر است ";
				break;
			case "16":
				$err = "دفعات برداشت وجه بيش از حد مجاز است ";
				break;
			case "17":
				$err = "كاربر از انجام تراكنش منصرف شده است ";
				break;
			case "18":
				$err = "تاريخ انقضاي كارت گذشته است ";
				break;
			case "19":
				$err = "مبلغ برداشت وجه بيش از حد مجاز است ";
				break;
			case "111":
				$err = "صادر كننده كارت نامعتبر است ";
				break;
			case "112":
				$err = "خطاي سوييچ صادر كننده كارت ";
				break;
			case "113":
				$err = "پاسخي از صادر كننده كارت دريافت نشد ";
				break;
			case "114":
				$err = "دارنده كارت مجاز به انجام اين تراكنش نيست";
				break;
			case "21":
				$err = "پذيرنده نامعتبر است ";
				break;
			case "23":
				$err = "خطاي امنيتي رخ داده است ";
				break;
			case "24":
				$err = "اطلاعات كاربري پذيرنده نامعتبر است ";
				break;
			case "25":
				$err = "مبلغ نامعتبر است ";
				break;
			case "31":
				$err = "پاسخ نامعتبر است ";
				break;
			case "32":
				$err = "فرمت اطلاعات وارد شده صحيح نمي باشد ";
				break;
			case "33":
				$err = "حساب نامعتبر است ";
				break;
			case "34":
				$err = "خطاي سيستمي ";
				break;
			case "35":
				$err = "تاريخ نامعتبر است ";
				break;
			case "41":
				$err = "شماره درخواست تكراري است ، دوباره تلاش کنید";
				break;
			case "42":
				$err = "يافت نشد  Sale تراكنش";
				break;
			case "43":
				$err = "داده شده است  Verify قبلا درخواست";
				break;
			case "44":
				$err = "يافت نشد  Verfiy درخواست";
				break;
			case "45":
				$err = "شده است  Settle تراكنش";
				break;
			case "46":
				$err = "نشده است  Settle تراكنش";
				break;
			case "47":
				$err = "يافت نشد  Settle تراكنش";
				break;
			case "48":
				$err = "شده است  Reverse تراكنش";
				break;
			case "49":
				$err = "يافت نشد  Refund تراكنش";
				break;
			case "412":
				$err = "شناسه قبض نادرست است ";
				break;
			case "413":
				$err = "شناسه پرداخت نادرست است ";
				break;
			case "414":
				$err = "سازمان صادر كننده قبض نامعتبر است ";
				break;
			case "415":
				$err = "زمان جلسه كاري به پايان رسيده است ";
				break;
			case "416":
				$err = "خطا در ثبت اطلاعات ";
				break;
			case "417":
				$err = "شناسه پرداخت كننده نامعتبر است ";
				break;
			case "418":
				$err = "اشكال در تعريف اطلاعات مشتري ";
				break;
			case "419":
				$err = "تعداد دفعات ورود اطلاعات از حد مجاز گذشته است ";
				break;
			case "421":
				$err = "نامعتبر است  IP";
				break;
			case "51":
				$err = "تراكنش تكراري است ";
				break;
			case "54":
				$err = "تراكنش مرجع موجود نيست ";
				break;
			case "55":
				$err = "تراكنش نامعتبر است ";
				break;
			case "61":
				$err = "خطا در واريز ";
				break;
			default:
				$err = "خطای نا مشخص";
				break;
		}
		return $err;
	}
}