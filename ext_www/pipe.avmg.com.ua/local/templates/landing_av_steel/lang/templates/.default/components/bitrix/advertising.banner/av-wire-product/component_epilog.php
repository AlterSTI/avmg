<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av-wire-product"]);

AvComponentsIncludings::getInstance()
	->setIncludings("av-wire-product", "form.button", "av-wire-product");