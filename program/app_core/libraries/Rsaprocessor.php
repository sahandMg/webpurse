<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
define("BCCOMP_LARGER", 1);
class RSAProcessor
{
 private $public_key = null;
 private $private_key = null;
 private $modulus = null;
 private $key_length = "1024";
 public function __construct($xmlRsakey='<RSAKeyValue><Modulus>vNoG7ZqbjVB+JUtHTUG0slw627NNO/5Kd5ZT7WwydE7V+TfdNtuM9F4/F0FBIq1W2DJDt+URL3r5e+tt0B6SpSvBiIlplPhCrNMTYfcqp5JKb9Acwbt1HV+6vgqMg5z0BL8zs9JffXNbKWzu5Ap7UeD+B4aKmKpVCKcZ4aF4OSc=</Modulus><Exponent>AQAB</Exponent><P>5dKBtnQIabWfP6lySaBRY7j09DnleemODyH2fO/Noa3XpJuVMl2wTpiWK0yjaSjshSZBTjQx05PAKk84mvsh6w==</P><Q>0lzW119icTQT7Xjd8DC/Tc1T3RROFh8HaOZRWKI98l/eHFp+fheJNe840r/Gf5UggWkNuyEuD7VRRakJMC46tQ==</Q><DP>ZjRUfShi6Wfc1znq2nVSXK/PN6FbvPixtWccL/mREBq4cLrEAe8KThmrhrwBW+3YKWqW1kl98yKc7fPnL30JWw==</DP><DQ>h2gdHosWabnU7fH0Iiyup1z4k4EDdnfIpDxEtmHQsBgHd4bEj1OFDcOLdxTcp7kNMF+35/FGnfPfeZCCCpJnVQ==</DQ><InverseQ>aTBXonPOtVmDOhRQfAgT6WBpZrv8WQgLGh7sma9QVDT/RI06JV/+uFeUs/Y7QwBX51ICPuYXlZ9kCRugHfdPew==</InverseQ><D>pqYfBv0v1vv41SAgw2P/+IS6y7TlqtMzE2Rsm06nF0uaNlm9s/L554pjUjobKGaeBBoW9+gDykpSba/LL6RK8kHB9uWkFXXgVizBFk5pCGM/tMmVrI9VLnifWwBVJid0VLC14OEMwPW3PE4tPGkZg/DdU5/pnzjGrljQKyQKY0E=</D></RSAKeyValue>',$type=1)
 {
   		$xmlObj = simplexml_load_string($xmlRsakey);
        $this->modulus = $this->binary_to_number(base64_decode($xmlObj->Modulus));
		$this->public_key = $this->binary_to_number(base64_decode($xmlObj->Exponent));
		$this->private_key = $this->binary_to_number(base64_decode($xmlObj->D));
		$this->key_length = strlen(base64_decode($xmlObj->Modulus))*8;
 }
 public function getPublicKey() {
  return $this->public_key;
 }
 public function getPrivateKey() {
  return $this->private_key;
 }
 public function getKeyLength() {
  return $this->key_length;
 }
 public function getModulus() {
  return $this->modulus;
 }
 public function encrypt($data) {
  return base64_encode($this->rsa_encrypt($data,$this->public_key,$this->modulus,$this->key_length));
 }
  public function dencrypt($data) {
  return $this->rsa_decrypt($data,$this->private_key,$this->modulus,$this->key_length);
 }
  public function sign($data) {
  return $this->rsa_sign($data,$this->private_key,$this->modulus,$this->key_length);
 }
  public function verify($data) {
  return $this->rsa_verify($data,$this->public_key,$this->modulus,$this->key_length);
 }
 function rsa_encrypt($message, $public_key, $modulus, $keylength) {
  $padded = $this->add_PKCS1_padding($message, true, $keylength / 8);
  $number = $this->binary_to_number($padded);
  $encrypted = $this->pow_mod($number, $public_key, $modulus);
  $result = $this->number_to_binary($encrypted, $keylength / 8);
  return $result;
 }
function rsa_decrypt($message, $private_key, $modulus, $keylength) {
  $number = $this->binary_to_number($message);
  $decrypted = $this->pow_mod($number, $private_key, $modulus);
  $result = $this->number_to_binary($decrypted, $keylength / 8);
  return $this->remove_PKCS1_padding($result, $keylength / 8);
 }
function rsa_sign($message, $private_key, $modulus, $keylength) {
  $padded = $this->add_PKCS1_padding($message, false, $keylength / 8);
  $number = $this->binary_to_number($padded);
  $signed = $this->pow_mod($number, $private_key, $modulus);
  $result = $this->number_to_binary($signed, $keylength / 8);
  return $result;
 }
function rsa_verify($message, $public_key, $modulus, $keylength) {
  return $this->rsa_decrypt($message, $public_key, $modulus, $keylength);
 }
function rsa_kyp_verify($message, $public_key, $modulus, $keylength) {
  $number = $this->binary_to_number($message);
  $decrypted = $this->pow_mod($number, $public_key, $modulus);
  $result = $this->number_to_binary($decrypted, $keylength / 8);
  return $this->remove_KYP_padding($result, $keylength / 8);
 }
function pow_mod($p, $q, $r) {
  $factors = array();
  $div = $q;
  $power_of_two = 0;
while(bccomp($div, "0") == BCCOMP_LARGER)  {
   $rem = bcmod($div, 2);
   $div = bcdiv($div, 2);
   if($rem) array_push($factors, $power_of_two);
   $power_of_two++;
  }
  $partial_results = array();
  $part_res = $p;
  $idx = 0;
  foreach($factors as $factor)  {
   while($idx < $factor)
   {
    $part_res = bcpow($part_res, "2");
    $part_res = bcmod($part_res, $r);
    $idx++;
   }
   array_push($partial_results, $part_res);
  }
  $result = "1";
  foreach($partial_results as $part_res)
  {
   $result = bcmul($result, $part_res);
   $result = bcmod($result, $r);
  }
  return $result;
 }
 function add_PKCS1_padding($data, $isPublicKey, $blocksize)
 {
  $pad_length = $blocksize - 3 - strlen($data);
  if($isPublicKey)
  {
   $block_type = "\x02";
   $padding = "";
   for($i = 0; $i < $pad_length; $i++)
   {
    $rnd = mt_rand(1, 255);
    $padding .= chr($rnd);
   }
  }
  else
  {
   $block_type = "\x01";
   $padding = str_repeat("\xFF", $pad_length);
  }
  return "\x00" . $block_type . $padding . "\x00" . $data;
 }
 function remove_PKCS1_padding($data, $blocksize)
 {
  assert(strlen($data) == $blocksize);
  $data = substr($data, 1);
  if($data{0} == '\0')
  die("Block type 0 not implemented.");
  assert(($data{0} == "\x01") || ($data{0} == "\x02"));
  $offset = strpos($data, "\0", 1);
  return substr($data, $offset + 1);
 }
 function remove_KYP_padding($data, $blocksize)
 {
  assert(strlen($data) == $blocksize);
  $offset = strpos($data, "\0");
  return substr($data, 0, $offset);
 }
 function binary_to_number($data)
 {
  $base = "256";
  $radix = "1";
  $result = "0";
  for($i = strlen($data) - 1; $i >= 0; $i--)
  {
   $digit = ord($data{$i});
   $part_res = bcmul($digit, $radix);
   $result = bcadd($result, $part_res);
   $radix = bcmul($radix, $base);
  }
  return $result;
  }
 function number_to_binary($number, $blocksize)
 {
  $base = "256";
  $result = "";
  $div = $number;
  while($div > 0)
  {
   $mod = bcmod($div, $base);
   $div = bcdiv($div, $base);
   $result = chr($mod) . $result;
  }
  return str_pad($result, $blocksize, "\x00", STR_PAD_LEFT);
 }
}
