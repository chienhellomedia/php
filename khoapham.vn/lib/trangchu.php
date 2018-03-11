<?php 
function tinmoinhat(){
	$qr = "SELECT * from tin ORDER BY idTin DESC LIMIT 0, 1";
	return mysql_query($qr);
}
function tinmoinhat_next(){
	$qr = "SELECT * from tin ORDER BY idTin DESC LIMIT 1, 6";
	return mysql_query($qr);
}

function sotinxemnhieunhat(){
	$qr = "SELECT * FROM tin ORDER BY SoLanXem  DESC LIMIT 0, 6";
	return mysql_query($qr);
}

function tinmoitheoloaitin_mot($idLT){
	$qr = " SELECT * FROM tin WHERE idLT = $idLT ORDER BY SoLanXem DESC LIMIT 0, 1";
	return mysql_query($qr);
}
function tinmoitheoloaitin_ba($idLT){
	$qr = " SELECT * FROM tin WHERE idLT = $idLT ORDER BY SoLanXem DESC LIMIT 1, 3";
	return mysql_query($qr);
}
function theloaitin_ba($idLT){
	$qr = "SELECT * FROM theloai WHERE idTL = $idLT";
	return mysql_query($qr);
}

function QuangCaotopphai(){
	$qr =" SELECT * FROM quangcao WHERE vitri = 1 LIMIT 0, 3";
	return mysql_query($qr);
}
function QuangCaoduoi(){
	$qr =" SELECT * FROM quangcao WHERE vitri = 2 LIMIT 0, 3";
	return mysql_query($qr);
}

function theloai(){
	$qr = "SELECT * FROM theloai";
	return mysql_query($qr);
}
function loaitin($idTL){
	$qr = " SELECT * FROM loaitin where idTL = $idTL";
	return mysql_query($qr);
}
function xemnhieu_theloai($idTL){
	$qr = "SELECT * FROM tin where idTL = $idTL order by SoLanXem desc limit 0, 1";
	return mysql_query($qr);
}
function xemnhieu_theloai2($idTL){
	$qr = "SELECT * FROM tin where idTL = $idTL order by SoLanXem desc limit 1, 2";
	return mysql_query($qr);
}
function tintheoloaitin($idLT){
	$qr = "SELECT * FROM tin WHERE idLT = $idLT order by idTin DESC";
	return mysql_query($qr);
}
function tintheoloaitin_phantrang($idLT, $from, $sotin1rang){
	$qr = "SELECT * FROM tin WHERE idLT = $idLT order by idTin DESC limit $from, $sotin1rang";
	return mysql_query($qr);
}


function breakCrum($idLT){
	$qr ="
	SELECT TenTL, Ten FROM theloai, loaitin where theloai.idTL = loaitin.idTL and idLT = $idLT";
	return mysql_query($qr);
}

function chitiettin($idTin){
	$qr = "
	SELECT * from tin where idTin = $idTin; 
	";
	return mysql_query($qr);
}
function tincungloai($idTin, $idLT){
	$qr = "
	SELECT * from tin where idTin <>$idTin and idLT = $idLT order by rand() limit 0, 3
	";
	return mysql_query($qr);
}

function capnhapsolanxemtin($idTin){
	$qr = "UPDATE tin set SoLanXem = SoLanXem + 1 where idTin = $idTin";
	mysql_query($qr);
}
function timkiem($tukhoa){
	$qr = "
	SELECT * FROM tin where TieuDe REGEXP '$tukhoa' order by idTin DESC 
	";
	return mysql_query($qr);
}
function DanhSachLoaiTin_Theo_TheLoai($idTL)
{
	$qr = "SELECT * FROM loaitin where idTL = $idTL";
	return mysql_query($qr);
}
?>
