<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LotteryController extends Controller
{
    protected $request;

    public function __construct(
        Request $request
    ){
        $this->request = $request;
    }

    public function index(Request $request)
    {
        $response = [];

        if(!empty(session()->all())) {
            $lotteryOne =  session()->get('lottery_one');
            $lotteryTwo1 =  session()->get('lottery_two_1');
            $lotteryTwo2 =  session()->get('lottery_two_2');
            $lotteryTwo3 =  session()->get('lottery_two_3');
            $lastLotteryTwo =  session()->get('last_lottery_two');
            $sideLotteryOne1 =  session()->get('side_lottery_one_1');
            $sideLotteryOne2 =  session()->get('side_lottery_one_2');
        } else {
            $lotteryTwo1 = null;
            $lotteryOne = null;
            $lotteryTwo2 = null;
            $lotteryTwo3 = null;
            $lastLotteryTwo = null;
            $sideLotteryOne1 = null;
            $sideLotteryOne2 = null;
        }

        $key = $request->input('lottery');

        if(!empty($key) && !empty($lotteryOne) && !empty($lotteryTwo1) && !empty($lotteryTwo2) && !empty($lotteryTwo3) && !empty($lastLotteryTwo) && !empty($sideLotteryOne1) && !empty($sideLotteryOne2)){
            if(str_contains($lotteryOne, $key)){

                if(str_contains( $key, $lastLotteryTwo)){
                    $success = $key. ' ถูกรางวัลที่ 1 และรางวัลเลขท้าย 2 ตัว';
                    $error = null;

                } else if(str_contains($lotteryTwo1, $key) || str_contains($lotteryTwo2, $key) || str_contains($lotteryTwo3, $key)) {
                    $success = $key. ' ถูกรางวัลที่ 1 และรางวัลที่ 2';
                    $error = null;
                } else {
                    $success = $key. ' ถูกรางวัลที่ 1';
                    $error = null;
                }

            } else if(str_contains($lotteryTwo1, $key) || str_contains($lotteryTwo2, $key) || str_contains($lotteryTwo3, $key)) {

                if(str_contains( $key, $lastLotteryTwo)){
                    $success = $key. ' ถูกรางวัลที่ 2 และรางวัลเลขท้าย 2 ตัว';
                    $error = null;

                } else if(str_contains($sideLotteryOne1, $key) || str_contains($sideLotteryOne2, $key)) {
                    $success = $key. ' ถูกรางวัลที่ 2 และรางวัลข้างเคียงรางวัลที่ 1';
                    $error = null;
                } else {
                    $success = $key. ' ถูกรางวัลที่ 2';
                    $error = null;
                }

            } else if(str_contains($sideLotteryOne1, $key) || str_contains($sideLotteryOne2, $key)) {

                if(str_contains( $key, $lastLotteryTwo)){
                    $success = $key. ' ถูกรางวัลข้างเคียงรางวัลที่ 1 และรางวัลเลขท้าย 2 ตัว';
                    $error = null;
                } else {
                    $success = $key. ' ถูกรางวัลข้างเคียงรางวัลที่ 1';
                    $error = null;
                }
            } else if(str_contains($key, $lastLotteryTwo)) {

                $success = $key. ' ถูกรางวัลเลขท้าย 2 ตัว';
                $error = null;
                
            } else {

                $success = null;
                $error = $key. ' เสียใจด้วยคุณไม่ถูกรางวัล';
                
            }
        } else {
            $success = null;
            $error = null;
        }

        $response['lottery_one'] = $lotteryOne;
        $response['lottery_two_1'] = $lotteryTwo1;
        $response['lottery_two_2'] = $lotteryTwo2;
        $response['lottery_two_3'] = $lotteryTwo3;
        $response['last_lottery_two'] = $lastLotteryTwo;
        $response['side_lottery_one_1'] = $sideLotteryOne1;
        $response['side_lottery_one_2'] = $sideLotteryOne2;

        $response['success'] = $success;
        $response['error'] = $error;
        $response['key'] = $key;

        return view('lottery', $response);
    }

    public function lotteryRandom()
    {
        
        $lotteryOne = lottery(3);

        $sideLotteryOne1 = $lotteryOne - 1 ;
        $sideLotteryOne2 = $lotteryOne + 1 ;

        $lotteryTwo1 = lottery(3);
        $lotteryTwo2 = lottery(3);
        $lotteryTwo3 = lottery(3);
        $lastLotteryTwo = lottery(2);

        if(strlen($sideLotteryOne1) <= 1){
            $textSideLotteryOne1 = "00{$sideLotteryOne1}";
        } else if(strlen($sideLotteryOne1) <= 2) {
            $textSideLotteryOne1 = "0{$sideLotteryOne1}";
        } else {
            $textSideLotteryOne1 = $sideLotteryOne1;
        }

        if(strlen($sideLotteryOne2) <= 1){
            $textSideLotteryOne2 = "00{$sideLotteryOne2}";
        } else if(strlen($sideLotteryOne1) <= 2) {
            $textSideLotteryOne2 = "0{$sideLotteryOne2}";
        } else {
            $textSideLotteryOne2 = $sideLotteryOne2;
        }

        $response['lottery_one'] = $lotteryOne;
        $response['lottery_two_1'] = $lotteryTwo1;
        $response['lottery_two_2'] = $lotteryTwo2;
        $response['lottery_two_3'] = $lotteryTwo3;
        $response['last_lottery_two'] = $lastLotteryTwo;
        $response['side_lottery_one_1'] = $textSideLotteryOne1;
        $response['side_lottery_one_2'] = $textSideLotteryOne2;

        $this->request->session()->put($response);

        return redirect('/');
    }
}
