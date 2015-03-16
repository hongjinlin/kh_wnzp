<?php
	class CommonAction extends Action{
		public function _initialize(){
   		// 初始化的时候检查用户权限
   			if(!isset($_SESSION['username']) || $_SESSION['username']==''||
   					!isset($_SESSION['USER_AUTH_KEY']) || $_SESSION['USER_AUTH_KEY']!=C('USER_AUTH_KEY')){
					
				$this->redirect('Login/login');
			}
		}
		
		public function checkIsShowAllow(){
			//判断是否允许显示图片
			$Car=M('Car');
			$map = array();
			$map['isshow']=1; //查询允许显示的记录数
			$count = $Car->where($map)->count();// 查询满足要求的总记录数
			
			if($count>0){
				return false;//不允许
			}else{
				return true;//允许
			}
		}
		
		//导出EXCEL
		public function exportExcel($expTitle,$expCellName,$expTableData){
			$xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
			$fileName = $expTitle.date('_Y-m-d');//or $xlsTitle 文件名称可根据自己情况设定
			$cellNum = count($expCellName);
			$dataNum = count($expTableData);
			vendor("PHPExcel.PHPExcel");
			 
			$objPHPExcel = new PHPExcel();
			$cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
		
			//$objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
			// $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
			for($i=0;$i<$cellNum;$i++){
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
			}
			// Miscellaneous glyphs, UTF-8
			for($i=0;$i<$dataNum;$i++){
				for($j=0;$j<$cellNum;$j++){
					$objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
				}
			}
		
			header('pragma:public');
			header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
			header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
			exit;
		}
		
	}
?>
