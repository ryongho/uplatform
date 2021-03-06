<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\WishController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PushController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\QnaController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\FcmController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\FeeController;


use App\Models\User;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/admin/list', [AdminController::class, 'list']);// 관리자 리스트
Route::middleware('auth:sanctum')->get('/admin/detail', [AdminController::class, 'detail']);// 관리자 상세
Route::middleware('auth:sanctum')->post('/admin/regist', [AdminController::class, 'regist']);// 관리자 등록
Route::middleware('auth:sanctum')->put('/admin/update', [AdminController::class, 'update']);// 관리자 수정
Route::middleware('auth:sanctum')->delete('/admin/delete', [AdminController::class, 'delete']);//관리자 삭제
Route::middleware('auth:sanctum')->get('/admin/user/list', [UserController::class, 'list']);// 회원 리스트
Route::get('/excel/download/user_list', [ExcelController::class, 'user_list']); // 회원리스트 다운로드
Route::middleware('auth:sanctum')->get('/admin/user/detail', [UserController::class, 'detail']);// 회원 상세
Route::middleware('auth:sanctum')->get('/admin/user/area_info', [UserController::class, 'area_info_admin']);// 회원 추가정보
Route::middleware('auth:sanctum')->put('/admin/user/area_info/update', [UserController::class, 'update_area_admin']);// 회원 추가 정보 수정
Route::middleware('auth:sanctum')->get('/admin/user/reservation/list', [ReservationController::class, 'list_by_user_admin']);// 회원 지원 / 신청 내역
Route::middleware('auth:sanctum')->get('/admin/user/payment/list', [PaymentController::class, 'list_by_user_admin']);// 회원 결제내역

Route::middleware('auth:sanctum')->get('/admin/user/total_cnt', [UserController::class, 'total_cnt']);//대시보드 회원 총 카운트
Route::middleware('auth:sanctum')->get('/admin/user/dash_info', [UserController::class, 'dash_info']);//대시보드 총 카운트


Route::middleware('auth:sanctum')->get('/admin/partner/list', [PartnerController::class, 'list']);// 파트너 리스트
Route::middleware('auth:sanctum')->put('/admin/partner/approve', [PartnerController::class, 'approve']);// 파트너 승인
Route::get('/excel/download/partner_list', [ExcelController::class, 'partner_list']); // 파트너리스트 다운로드
Route::middleware('auth:sanctum')->get('/admin/partner/detail', [PartnerController::class, 'detail']);// 파트너 상세
Route::middleware('auth:sanctum')->get('/admin/partner/info', [PartnerController::class, 'info']);// 파트너 추가정보
Route::middleware('auth:sanctum')->put('/admin/partner/update', [PartnerController::class, 'update']);// 파트너 추가 정보 수정
Route::middleware('auth:sanctum')->get('/admin/partner/reservation/list', [ReservationController::class, 'list_by_partner_admin']);// 파트너 요청/완료내역
Route::middleware('auth:sanctum')->get('/admin/partner/pay/list', [PayController::class, 'list_by_partner_admin']);// 파트너 정산내역

Route::middleware('auth:sanctum')->get('/admin/notice/list', [NoticeController::class, 'list_admin']);// 어드민 공지 리스트
Route::middleware('auth:sanctum')->post('/admin/notice/regist', [NoticeController::class, 'regist']);// 어드민 공지 등록
Route::middleware('auth:sanctum')->get('/admin/notice/detail', [NoticeController::class, 'detail_admin']);//공지 상세
Route::middleware('auth:sanctum')->put('/admin/notice/update', [NoticeController::class, 'update']);//공지 수정
Route::middleware('auth:sanctum')->delete('/admin/notice/delete', [NoticeController::class, 'delete']);//공지 삭제

Route::middleware('auth:sanctum')->get('/admin/faq/list', [FaqController::class, 'list_admin']);// 어드민 faq 리스트
Route::middleware('auth:sanctum')->post('/admin/faq/regist', [FaqController::class, 'regist']);// 어드민 faq 등록
Route::middleware('auth:sanctum')->get('/admin/faq/detail', [FaqController::class, 'detail_admin']);//faq 상세
Route::middleware('auth:sanctum')->put('/admin/faq/update', [FaqController::class, 'update']);//faq 수정
Route::middleware('auth:sanctum')->delete('/admin/faq/delete', [FaqController::class, 'delete']);//faq 삭제

Route::middleware('auth:sanctum')->get('/admin/qna/list', [QnaController::class, 'list_admin']);// 어드민 qna 리스트
Route::middleware('auth:sanctum')->get('/admin/qna/detail', [QnaController::class, 'detail_admin']);//qna 상세
Route::middleware('auth:sanctum')->put('/admin/qna/answer', [QnaController::class, 'answer']);//qna 답변
Route::middleware('auth:sanctum')->delete('/admin/qna/delete', [QnaController::class, 'delete']);//qna 삭제

Route::middleware('auth:sanctum')->get('/admin/reservation/list', [ReservationController::class, 'list']);
Route::middleware('auth:sanctum')->get('/admin/reservation/list_cnt', [ReservationController::class, 'list_cnt']);
Route::middleware('auth:sanctum')->get('/admin/apply/list', [ApplyController::class, 'list']);
Route::middleware('auth:sanctum')->put('/admin/apply/match', [ApplyController::class, 'match']);
Route::middleware('auth:sanctum')->put('/admin/apply/rematch', [ApplyController::class, 'rematch']);
Route::middleware('auth:sanctum')->put('/admin/reservation/update_service_address', [ReservationController::class, 'update_service_address']);
Route::middleware('auth:sanctum')->put('/admin/reservation/cancel', [ReservationController::class, 'cancel_admin']);// 예약 취소
Route::middleware('auth:sanctum')->put('/admin/reservation/complete', [ReservationController::class, 'complete']);// 서비스 완료

Route::middleware('auth:sanctum')->get('/admin/payment/list', [PaymentController::class, 'list']);// 결제 리스트
Route::middleware('auth:sanctum')->get('/admin/payment/detail', [PaymentController::class, 'detail']);// 결제 상세
Route::middleware('auth:sanctum')->put('/admin/payment/cancel', [PaymentController::class, 'cancel']);// 결제 취소

Route::middleware('auth:sanctum')->get('/admin/pay/list', [PayController::class, 'list']);// 정산내역
Route::middleware('auth:sanctum')->get('/admin/pay/list/type', [PayController::class, 'list_type']);// 정산내역 - reservation_type 별
Route::middleware('auth:sanctum')->get('/admin/pay/list/partner', [PayController::class, 'list_partner']);// 정산내역 - partner 별
Route::middleware('auth:sanctum')->get('/admin/pay/list/day', [PayController::class, 'list_day']);// 정산내역 타입 - partner - 날짜 별
Route::middleware('auth:sanctum')->get('/admin/pay/list/date', [PayController::class, 'list_by_date']);// 정산내역 타입 - partner - 날짜 - 정산건별 리스트
Route::middleware('auth:sanctum')->get('/admin/partner/list/pay', [PayController::class, 'list_by_pay']);// 정산내역 타입 - partner - 날짜 - 정산건 - 파트너리스트
Route::middleware('auth:sanctum')->get('/admin/pay/list/payment', [PayController::class, 'list_payment']);// 정산내역 타입 - partner - 날짜 - 정산 건 별
Route::middleware('auth:sanctum')->put('/admin/pay', [PayController::class, 'pay']);// 정산처리
Route::middleware('auth:sanctum')->put('/admin/update/fee', [FeeController::class, 'update']);// 수수료 업데이트
Route::middleware('auth:sanctum')->get('/admin/get/fee', [FeeController::class, 'get_fee']);// 수수료 정보



Route::post('/user/regist/', [UserController::class, 'regist_user']); // 유저 등록
Route::post('/partner/regist', [UserController::class, 'regist_partner']); // 파트너 등록 
Route::post('/partner/regist_info', [PartnerController::class, 'regist']); // 파트너 정보 추가
Route::post('/area/regist_info', [AreaController::class, 'regist']); // 유저 정보 추가
Route::post('/user/login', [UserController::class, 'login']);// 로그인
Route::post('/user/sns_login', [UserController::class, 'sns_login']);// sns 로그인
Route::get('login', [UserController::class, 'not_login'])->name('login');// 비로그인 시 
Route::get('/su', [UserController::class, 'su']);// 슈펴로그인
Route::middleware('auth:sanctum')->post('/user/logout', [UserController::class, 'logout']); // 로그아웃
Route::middleware('auth:sanctum')->get('/user/login_check', [UserController::class, 'login_check']); // 로그인 상태 체크
Route::put('/user/find_id', [UserController::class, 'find_id']); // 아이디 찾기


Route::middleware('auth:sanctum')->get('/user/info', [UserController::class, 'info']); //유저 정보 가져오기
Route::middleware('auth:sanctum')->get('/user/partner_info', [UserController::class, 'partner_info']); //파트너 정보 가져오기
Route::middleware('auth:sanctum')->get('/user/area_info', [UserController::class, 'area_info']); //회원 추가 정보 가져오기
Route::get('/user/email', [UserController::class, 'get_email']); //유저 아이디(이메일) 정보 가져오기

Route::middleware('auth:sanctum')->put('/user/update', [UserController::class, 'update_user']);// 유저정보 업데이트
Route::middleware('auth:sanctum')->put('/partner/update', [UserController::class, 'update_partner']);// 파트너정보 업데이트
Route::middleware('auth:sanctum')->put('/user/leave', [UserController::class, 'leave']); // 회원 탈퇴
Route::middleware('auth:sanctum')->put('/user/change/type', [UserController::class, 'change_user_type']);// 유저타입 전환

Route::middleware('auth:sanctum')->put('/user/update/password', [UserController::class, 'update_password']);
Route::put('/user/update/password_by_phone', [UserController::class, 'update_password_by_phone']);


Route::post('/image/upload', [ImageController::class, 'upload']); // 이미지 업로드

Route::get('/service/list', [ServiceController::class, 'list']);// 서비스 리스트

Route::middleware('auth:sanctum')->post('/device/regist', [DeviceController::class, 'regist']);//디바이스 정보 등록

Route::middleware('auth:sanctum')->post('/reservation/regist', [ReservationController::class, 'regist']); //예약하기

Route::middleware('auth:sanctum')->post('/payment/regist', [PaymentController::class, 'regist']); // 결제내역 등록
Route::middleware('auth:sanctum')->get('/payment/list/user', [PaymentController::class, 'list_by_user']);// 결제 리스트
Route::middleware('auth:sanctum')->get('/pay/list/user', [PayController::class, 'list_by_user']);// 정산 리스트
Route::middleware('auth:sanctum')->get('/pay/detail', [PayController::class, 'detail']);// 정산 상세

Route::middleware('auth:sanctum')->get('/reservation/list/user', [ReservationController::class, 'list_by_user']);// 예약 리스트
Route::middleware('auth:sanctum')->get('/reservation/detail', [ReservationController::class, 'detail']);// 예약 상세 내용
Route::middleware('auth:sanctum')->put('/reservation/cancel', [ReservationController::class, 'cancel']);// 예약 취소
Route::middleware('auth:sanctum')->get('/reservation/payment/list', [ReservationController::class, 'payment_list']);// 결제 내역
Route::middleware('auth:sanctum')->delete('/reservation/delete', [ReservationController::class, 'delete']);// 예약 삭제


Route::middleware('auth:sanctum')->get('/request/list/', [ReservationController::class, 'reqeust_list']);// 서비스 요청 리스트
Route::middleware('auth:sanctum')->get('/request/detail', [ReservationController::class, 'request_detail']);// 서비스 요청 상세 내용
Route::middleware('auth:sanctum')->post('/apply/regist', [ApplyController::class, 'regist']);// 지원하기
Route::middleware('auth:sanctum')->put('/apply/cancel', [ApplyController::class, 'cancel']);// 지원 취소
Route::middleware('auth:sanctum')->put('/apply/complete', [ApplyController::class, 'complete']);// 서비스완료 취소
Route::middleware('auth:sanctum')->get('/apply/list/user', [ApplyController::class, 'list_by_user']);// 예약 리스트
Route::middleware('auth:sanctum')->get('/apply/detail', [ApplyController::class, 'detail']);// 예약 상세 내용

Route::get('/notice/list', [NoticeController::class, 'list']); // 공지 리스트
Route::get('/notice/detail', [NoticeController::class, 'detail']); // 공지 내용 


Route::middleware('auth:sanctum')->post('/push/regist', [PushController::class, 'regist']); // 푸시 등록
Route::middleware('auth:sanctum')->get('/push/list', [PushController::class, 'list']); // 푸시 리스트
Route::middleware('auth:sanctum')->post('/push/test', [PushController::class, 'test']); // 푸시 xptmxm

Route::middleware('auth:sanctum')->put('/notice/regist', [NoticeController::class, 'regist']); // 공지 등록
Route::get('/notice/list', [NoticeController::class, 'list']); // 공지 리스트
Route::get('/notice/detail', [NoticeController::class, 'detail']); // 공지 내용 
Route::middleware('auth:sanctum')->put('/notice/update', [NoticeController::class, 'update']);//공지 수정

Route::get('/faq/list', [FaqController::class, 'list']);//faq 리스트
Route::get('/faq/detail', [FaqController::class, 'detail']); //faq 내용


Route::middleware('auth:sanctum')->post('/qna/regist', [QnaController::class, 'regist']);
Route::middleware('auth:sanctum')->get('/qna/list', [QnaController::class, 'list']);
Route::middleware('auth:sanctum')->get('/qna/detail', [QnaController::class, 'detail']);
Route::middleware('auth:sanctum')->put('/qna/update', [QnaController::class, 'update']);

Route::put('/fcm/update', [FcmController::class, 'update']);// fcm토큰 업데이트







