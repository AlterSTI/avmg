<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av-wire-top"]);

AvComponentsIncludings::getInstance()
	->setIncludings("av-wire-top", "form.button", "av-wire-top");