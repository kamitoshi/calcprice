<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# calcprice
## 概要
当アプリは、個人でバーやスナックなどを経営していてレジがなく毎回電卓などで料金の計算をしているお店の料金計算アプリです。
料金を計算できるだけでなく、在庫の管理や新商品の登録などが容易で、日々の業務効率化につながります。
レジがあるお店にはそこまでメリットがあるわけではありませんが、ない場所には重宝すること間違いなしです。

## 開発環境
使用言語　PHP 8.0.0
フレームワークLaravel 6.20.7
Webサーバー　apache
データベース　MySQL５．７

varchalBoxの仮想環境、Homesteadで仮想環境立ち上げ

## ER図（データベース設計）
![【ER図】CalcPrice](https://user-images.githubusercontent.com/59524605/102481372-fb4eed00-40a4-11eb-8d81-936544bb09b6.png)

### 諸注意
Laravel勉強のために作ったアプリになります。
必要のないメソッドやControllerなどがあることや、ControllerやModelの記述が煩雑になってしまったことや処理内容が重複しているなど改善点はまだまだあります。
今後リファクタリングしていきますが、現段階ではこの程度になってしまします。ご了承ください。

