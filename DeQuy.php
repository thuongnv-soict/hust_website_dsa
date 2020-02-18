<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script type="text/javascript" src="scripts/shCore.js"></script>
	<script type="text/javascript" src="scripts/shBrushCpp.js"></script>
	<link type="text/css" rel="stylesheet" href="styles/shCoreDefault.css"/>
	<link type="text/css" rel="stylesheet" href="content.css"/>
	<script type="text/javascript">SyntaxHighlighter.all();</script>
	<title> Đệ quy </title>

	<style type="text/css">
		img{
			max-width: 400px;
			height: auto;
		}
		#insert, #delete, #locate, #retrieve{
			display: none;
		}
		.desc{
			border: 1px solid black;
			padding: 5px 20px;
		}
		table {	
			width: 75%;
			border-collapse: collapse;
			//background-color: #eee;
		}

		tr {
			border-bottom: 1px solid #d9d9d9;
		}
		td, th{
			text-align: left;
			padding : 0px 10px;
		}
		th{
			font-weight: normal;
			color: #279;
		}
		tr:nth-child(even) {background-color: #f2f2f2}
	</style>
	<script src="path.js"> </script>
</head>
<body>
	<nav>
		<ul>
			<li> <a href="#1"> 1. Khái niệm </a> </li> 
			<ul>
				<li> <a href="#1.1"> 1.1 Hàm đệ quy </a> </li>
				<li> <a href="#1.2"> 1.2 Ưu và nhược điểm </a> </li>
			</ul>
			<li> <a href="#2"> 2. Thuật toán đệ quy  </a> </li>
			<ul>
				<li> <a href="#2.1"> 2.1 Cấu trúc của giải thuật đệ quy </a> </li>
				<li> <a href="#2.2"> 2.2 Các loại đệ quy cơ bản</a> </li>
				<ul>
					<li> <a href="#2.2.1"> 2.2.1 Đệ quy tuyến tính </a> </li>
					<li> <a href="#2.2.2"> 2.2.2 Đệ quy nhị phân </a> </li>
				</ul>
				<li> <a href="#2.3"> 2.3 Phân tích thuật toán đệ quy </a> </li>
			</ul>
			<li> <a href="#3"> 3. Thuật toán quay lui  </a> </li>
			<ul>
				<li> <a href="#3.1"> 3.1 Khái niệm </a> </li>
				<li> <a href="#3.2"> 3.2 Bài toán liệt kê </a> </li>
				<li> <a href="#3.3"> 3.3 Bài toán xếp hậu</a> </li>
			</ul>
			<li> <a href="#4"> 4. Bài tập tự làm</a> </li>
		</ul>
		<!-- Đệ quy có nhớ  -->

	</nav>
	<main>	
		<h1> Đệ quy </h1>
		<h2 id="1">1. Khái niệm </h2>
			<p class="tab3"> Đệ quy (Recursion) là một trong những giải thuật khá quen thuộc trong lập trình, mở rộng ra là trong toán học (thường được gọi với tên khác là “quy nạp”). Có một số bài toán, buộc phải sử dụng đệ quy mới giải quyết được, chẳng hạn như duyệt cây. </p>
			
			<h3 id ="1.1" > 1.1 Hàm đệ quy </h3>
			<p class="tab3"> Các hàm đệ quy được xác định phụ thuộc vào biến nguyên không âm n theo sơ đồ sau: </p>
			<p class="tab3"> <b>Bước cơ sở (Basic Step):</b> Xác định giá trị của hàm tại n = 0: f(0). </p>
			<p class="tab3"> <b>Bước đệ quy (Recursive Step):</b> Cho giá trị của f(k), k &le; n, đưa ra quy tắc tính giá trị của f(n+1). </p>
			<p class="tab3"> <b>Ví dụ 1: </b>&nbsp;f(0) = 3,       n = 0</p>
			<p class="tab7"> f(n+1) = 2f(n) + 3,       n > 0</p>
			<p class="tab3"> Khi đó ta có: f(1) = 2 * 3 +3 = 9, f(2) = 2* 9 + 3  21, ... </p>
			<p class="tab3"> <b>Ví dụ 2: </b> Định nghĩa đệ quy của n!: </p>
			<p class="tab6"> f(0) = 1; </p>
			<p class="tab6"> f(n+1) = f(n) * (n+1); </p>
			<p class="tab3"> <b>Ví dụ 3: </b> Dãy số Fibonaci: </p>
			<p class="tab6"> f(0) = 0, f(1) = 1, </p>
			<p class="tab6"> f(n) = f(n-1) + f(n-2); </p>
			<p class="tab3"> Để tính giá trị của hàm đệ quy ta thay thế dần theo định nghĩa đệ quy để thu được biểu thức với đối số càng ngày càng nhỏ cho đến tận điểu kiện đầu.</p>
<pre class="brush: cpp;">
void Recusion(){
    Recusion();
}</pre>
			<h3 id ="1.2" > 1.2 Ưu và nhược điểm </h3>
			<p class="tab3"> Giải thuật đệ quy có ưu điểm là thuận lợi cho việc biểu diễn bài toán, đồng thời làm gọn chương trình. Tuy nhiên cũng có nhược điểm, đó là không tối ưu về mặt thời gian (so với sử dụng vòng lặp), gây tốn bộ nhớ. </p>	
		
		<h2 id="2">2. Thuật toán đệ quy </h2>	
			<p class="tab3"> <i> Thuật toán đệ quy là thuật toán tự gọi đến chính mình với đầu vào kích thước nhỏ hơn </i> </p>
			<h3 id ="2.1" > 2.1 Cấu trúc của giải thuật đệ quy </h3>
			<p class="tab3"> Thuật toán đệ quy thường có cấu trúc sau đây: </p>
<pre class="brush: cpp;">
Thuật toán RecAlg(input){
	begin
		if (kích thước của input là nhỏ nhất) then
			//Thực hiện bước cơ sở
		else 
			Recalg(input với kích thước nhỏ hơn);
			Tổ hợp lời giải của các bài toán con để thu được lời_giải;
			return lời_giải;
		endif
	end;
}</pre>		
		<h3 id ="2.2" > 2.2 Các loại đệ quy cơ bản</h3>
		<h4 id ="2.2.1"> 2.2.1 Đệ quy tuyến tính </h4>
		<p class="tab3"> Mỗi lần thực thi chỉ gọi đệ quy một lần.</p>
<pre class="brush: cpp;">
int Factorial(int n){
    if (n == 0){
        return 1;
    }
    else{
        return n * Factorial(n - 1); // Linear Recursion
    }
}</pre>
		<p class="tab3"> Nguyên tắc hoạt động: </p>
		<img class="tab3" src="./picture/dequy/n!.gif" alt="Factorial"/>
	
		<h4 id ="2.2.2"> 2.2.2 Đệ quy nhị phân </h4>
		<p class="tab3"> Mỗi lần thực thi có thể gọi đệ quy 2 lần.</p>
<pre class="brush: cpp;">
int Fibonaci(int n){
    if (n == 0){
        return 0;
    }
	if (n == 1){
        return 1;
    }
    else{
        return Fibonaci(n - 1) + Fibonaci(n - 2);
    }
}</pre>
		<p class="tab3"> Nguyên tắc hoạt động: </p>
		<img class="tab3" src="./picture/dequy/fibonaci.gif" alt="Factorial"/>
		<!-- Phân tích thuật toán ở đây -->
		
											<!--                  QUAY LUI                			-->		
											
	<h2 id="3">3. Thuật toán quay lui </h2>
		<h3 id="3.1"> 3.1 Khái niệm </h3>
			<p class="tab3"> Thuật toán quay lui dùng để giải bài toán liệt kê các cấu hình. Mỗi cấu hình được xây dựng bằng cách xây dựng từng phần tử, mỗi phần tử được chọn bằng cách thử tất cả các khả năng. </p>
		<h3 id ="3.2" >3.2 Bài toán liệt kê </h3>
			<p class="tab3"> <b>Bài toán liệt kê (Q):</b> Cho A<sub>1</sub>, A<sub>2</sub>, ..., A<sub>n</sub> là các tập hữu hạn. Ký hiệu:  </p>
			<p class="tab7"> X = A<sub>1</sub> &times; A<sub>2</sub> &times; ... &times; A<sub>n</sub> = { (x<sub>1</sub>, x<sub>2</sub>, ..., x<sub>n</sub>): x<sub>i</sub> &isin; A<sub>i</sub>, i = 1, 2, ... , n }. </p>
			<p class="tab3"> <i> Giả sử P là tính chất cho trên X. Vấn đề đặt ra ở đây là liệt kê tất cả các phần tử của X thỏa mãn tính chất của P: </i> </p>
			<p class="tab7"> D = { x = (x<sub>1</sub>, x<sub>2</sub>, ..., x<sub>n</sub> &isin; X: x thỏa mãn tính chất của P}. </p>			
			<p class="tab3"> Các phần tử của tập D được gọi là các lời giải chấp nhận được. </p>
			<p class="tab3"> <b> Ví dụ:</b> </p>
			<p class="tab3"> - Bài toán liệt kê xâu nhị phân độ dài n dẫn về việc liệt kê các phần tử của tập: </p>
			<p class="tab7"> B<sup>n</sup> = {(x<sub>1</sub>, x<sub>2</sub>, ..., x<sub>n</sub>) : x<sub>i</sub> &isin; {0, 1}, i = 1, 2, ... , n}. </p>
<pre class="brush: cpp;">
#include <stdio.h>
#include <conio.h>
int a[20];					// Mảng lưu trữ từng giá trị của xâu nhị phân
void backtrack(int k, int n){
	int i;
	for (i=0;i<=1;i++){    	// i nhận giá trị nhị phân là 0 và 1
		a[k]=i;
		if (k==n) {
			for (int j=1;j<=n;j++) printf("%d  ",a[j]);
			printf("\n");
		} 
		else backtrack(k+1,n);
	}
}
int main(){
	int m;      			// Độ dài xâu nhị phân
	printf("Nhap m: "); scanf("%d",&m);
	backtrack(1,m);
	getch();
}</pre>			
			<p class="tab3"> - Bài toán liệt kê các tập con m phần tử của tập N = {1, 2, ..., n} đòi hỏi liệt kê các phần tử của tập </p>
			<p class="tab7"> S(m, n) = {(x<sub>1</sub>, x<sub>2</sub>, ..., x<sub>m</sub>) &isin; N<sup>m</sup> : 1 &le; x<sub>1</sub> < ... < x<sub>m</sub> &le; n}.</p>
			
			<p class="tab3"> - Tập các hoán vị của các số tự nhiên 1, 2, ..., n là tập: </p>
			<p class="tab7">  &prod;<sub>n</sub> = { (x<sub>1</sub>, x<sub>2</sub>, ..., x<sub>n</sub>) &isin; N<sup>n</sup> : x<sub>i</sub> &ne; x<sub>j</sub>; i&ne;j }  </p>
			

			<p class="tab3"> <b>Định nghĩa: </b> Ta gọi lời giải bộ phận cấp k (0 &le; k &le; n) là bộ có thứ tự gồm k thành phần (a<sub>1</sub>, a<sub>2</sub>, ..., a<sub>n</sub>), trong đó a<sub>i</sub> &isin; A<sub>i</sub>, i = 1, 2, ..., k. </p>
			<p class="tab3"> Khi k = 0, lời giải bộ phận cấp 0 được gọi là lời giải rỗng</p>
			<p class="tab3"> Khi k = n, ta có lời giải đầy đủ hay đơn giản hơn là một lời giải của bài toán.</p>
		<h3 id ="3.3" >3.3 Bài toán xếp hậu </h3>
	<h2 id = "3"> 3. Bài tập tự làm </h2>
	</main>
</body>


</html>