<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\BaomingService;
use Maatwebsite\Excel\Excel;
use App\Export\ExportExcel;

class NewacmerController extends Controller
{
    /**
     * @var BaomingService
     */
    private $baomingService;

    public function __construct(BaomingService $baomingService)
    {
        $this->baomingService = $baomingService;
    }

    public function baoming(request $request)
    {
        try{
            $this->baomingService->baoming($request->all());
        } catch (\Exception $e) {
            return response([
                'result'    => false
            ]);
        }
        return response([
            'result'    => true
        ]);
    }

    public function getExcel(Excel $excel, ExportExcel $exportExcel)
    {
        $exportExcel->getDataFromTable('newacmers', [
            '姓名'            => 'name',
            '性别'            => 'gender',
            '学号'            => 'studentNumber',
            'QQ号'            => 'qqNumber',
            '学院|专业'       => 'college|major',
            '电话号码'         => 'phoneNumber'
        ], true);

        return $exportExcel->download('报名信息表.xlsx');
    }
}
