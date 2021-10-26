<li>1. Viết PHP script để tạo mảng liên hợp hiển thị tên các quốc gia và thủ đô trên danh 
sách. Dữ liệu được khai báo trực tiếp trong file.
</li>
<?php
            
    $a = array( "Viet nam" => "Ha Noi",
            	"Indonesia" => "Jakarta",
            	"Lao" => "Vieng Chan",
            	"Campuchia" => "Phnom Penh",
            	" Philippines" => "Manila",
            	" Thai Lan	" => "Bang Coc",
            	" Malaysia" => "Kuala Lumpur",
            	" Brunei" => "Bandar Seri Begawan",
            	" Singapore" => "Singapore",
            	" Myanmar" => "Naypyidaw",
            	" Dong Timor" => "Dili"
        );  
			
			
			foreach($a as $nuoc => $td)  
			{  
			  echo "- Thu do cua $nuoc : $td"."<br>" ;  
			}  
       ?>