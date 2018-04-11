<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/docs/pub/(?<hash>[0-9a-f]{32})/(?<action>[0-9a-zA-Z]+)/\\?#",
		"RULE" => "hash=\$1&action=\$2&",
		"ID" => "bitrix:disk.external.link",
		"PATH" => "/docs/pub/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/pub/form/([0-9a-z_]+?)/([0-9a-z]+?)/.*#",
		"RULE" => "form_code=\$1&sec=\$2",
		"ID" => "bitrix:crm.webform.fill",
		"PATH" => "/pio_profnastil/pub/form.php",
	),
	array(
		"CONDITION" => "#^/disk/(?<action>[0-9a-zA-Z]+)/(?<fileId>[0-9]+)/\\?#",
		"RULE" => "action=\$1&fileId=\$2&",
		"ID" => "bitrix:disk.services",
		"PATH" => "/bitrix/services/disk/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/tasks/getfile/(\\d+)/(\\d+)/([^/]+)#",
		"RULE" => "taskid=\$1&fileid=\$2&filename=\$3",
		"ID" => "bitrix:tasks_tools_getfile",
		"PATH" => "/pio_profnastil/tasks/getfile.php",
	),
	array(
		"CONDITION" => "#^/pub/pay/([\\w\\W]+)/([0-9a-zA-Z]+)/([^/]*)#",
		"RULE" => "account_number=\$1&hash=\$2",
		"ID" => "",
		"PATH" => "/pub/payment.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/configs/mailtemplate/#",
		"RULE" => "",
		"ID" => "bitrix:crm.mail_template",
		"PATH" => "/pio_profnastil/crm/configs/mailtemplate/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/configs/productprops/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.productprops",
		"PATH" => "/pio_profnastil/crm/configs/productprops/index.php",
	),
	array(
		"CONDITION" => "#^/pub/form/([0-9a-z_]+?)/([0-9a-z]+?)/.*#",
		"RULE" => "form_code=\$1&sec=\$2",
		"ID" => "bitrix:crm.webform.fill",
		"PATH" => "/pub/form.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/configs/automation/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.automation",
		"PATH" => "/pio_profnastil/crm/configs/automation/index.php",
	),
	array(
		"CONDITION" => "#^\\/?\\/mobile/mobile_component\\/(.*)\\/.*#",
		"RULE" => "componentName=\$1",
		"ID" => "mobile_js_component",
		"PATH" => "/bitrix/services/mobile/jscomponent.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/configs/locations/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.locations",
		"PATH" => "/pio_profnastil/crm/configs/locations/index.php",
	),
	array(
		"CONDITION" => "#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#",
		"RULE" => "alias=\$1",
		"ID" => "bitrix:im.router",
		"PATH" => "/desktop_app/router.php",
	),
	array(
		"CONDITION" => "#^/mobile/disk/(?<hash>[0-9]+)/download#",
		"RULE" => "download=1&objectId=\$1",
		"ID" => "bitrix:mobile.disk.file.detail",
		"PATH" => "/mobile/disk/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/configs/currency/#",
		"RULE" => "",
		"ID" => "bitrix:crm.currency",
		"PATH" => "/pio_profnastil/crm/configs/currency/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/configs/measure/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.measure",
		"PATH" => "/pio_profnastil/crm/configs/measure/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/configs/fields/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.fields",
		"PATH" => "/pio_profnastil/crm/configs/fields/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/configs/exch1c/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.exch1c",
		"PATH" => "/pio_profnastil/crm/configs/exch1c/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/reports/report/#",
		"RULE" => "",
		"ID" => "bitrix:crm.report",
		"PATH" => "/pio_profnastil/crm/reports/report/index.php",
	),
	array(
		"CONDITION" => "#^/tasks/getfile/(\\d+)/(\\d+)/([^/]+)#",
		"RULE" => "taskid=\$1&fileid=\$2&filename=\$3",
		"ID" => "bitrix:tasks_tools_getfile",
		"PATH" => "/tasks/getfile.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/configs/perms/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.perms",
		"PATH" => "/pio_profnastil/crm/configs/perms/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/bizproc/processes/#",
		"RULE" => "",
		"ID" => "bitrix:lists",
		"PATH" => "/pio_profnastil/bizproc/processes/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/company/personal/#",
		"RULE" => "",
		"ID" => "bitrix:socialnetwork_user",
		"PATH" => "/pio_profnastil/company/personal.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/company/gallery/#",
		"RULE" => "",
		"ID" => "bitrix:photogallery_user",
		"PATH" => "/pio_profnastil/company/gallery/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/configs/tax/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.tax",
		"PATH" => "/pio_profnastil/crm/configs/tax/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/timeman/meeting/#",
		"RULE" => "",
		"ID" => "bitrix:meetings",
		"PATH" => "/pio_profnastil/timeman/meeting/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/configs/bp/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.bp",
		"PATH" => "/pio_profnastil/crm/configs/bp/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/services/lists/#",
		"RULE" => "",
		"ID" => "bitrix:lists",
		"PATH" => "/pio_profnastil/services/lists/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/configs/ps/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.ps",
		"PATH" => "/pio_profnastil/crm/configs/ps/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/about/gallery/#",
		"RULE" => "",
		"ID" => "bitrix:photogallery",
		"PATH" => "/pio_profnastil/about/gallery/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/services/idea/#",
		"RULE" => "",
		"ID" => "bitrix:idea",
		"PATH" => "/pio_profnastil/services/idea/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/services/wiki/#",
		"RULE" => "",
		"ID" => "bitrix:wiki",
		"PATH" => "/pio_profnastil/services/wiki.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/services/faq/#",
		"RULE" => "",
		"ID" => "bitrix:support.faq",
		"PATH" => "/pio_profnastil/services/faq/index.php",
	),
	array(
		"CONDITION" => "#^/partners/contacts/personal/#",
		"RULE" => "",
		"ID" => "bitrix:socialnetwork_user",
		"PATH" => "/partners/contacts/personal.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/contact/#",
		"RULE" => "",
		"ID" => "bitrix:crm.contact",
		"PATH" => "/pio_profnastil/crm/contact/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/invoice/#",
		"RULE" => "",
		"ID" => "bitrix:crm.invoice",
		"PATH" => "/pio_profnastil/crm/invoice/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/product/#",
		"RULE" => "",
		"ID" => "bitrix:crm.product",
		"PATH" => "/pio_profnastil/crm/product/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/company/#",
		"RULE" => "",
		"ID" => "bitrix:crm.company",
		"PATH" => "/pio_profnastil/crm/company/index.php",
	),
	array(
		"CONDITION" => "#^/partners/workgroups/create/#",
		"RULE" => "",
		"ID" => "bitrix:extranet.group_create",
		"PATH" => "/partners/workgroups/create/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/docs/manage/#",
		"RULE" => "",
		"ID" => "bitrix:disk.common",
		"PATH" => "/pio_profnastil/docs/manage/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/webform/#",
		"RULE" => "",
		"ID" => "bitrix:crm.webform",
		"PATH" => "/pio_profnastil/crm/webform/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/services/bp/#",
		"RULE" => "",
		"ID" => "bitrix:bizproc.wizards",
		"PATH" => "/pio_profnastil/services/bp/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/workgroups/#",
		"RULE" => "",
		"ID" => "bitrix:socialnetwork_group",
		"PATH" => "/pio_profnastil/workgroups/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/deal_category/#",
		"RULE" => "",
		"ID" => "bitrix:crm.deal_category",
		"PATH" => "/crm/configs/deal_category/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/docs/shared#",
		"RULE" => "",
		"ID" => "bitrix:disk.common",
		"PATH" => "/pio_profnastil/docs/shared/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/button/#",
		"RULE" => "",
		"ID" => "bitrix:crm.button",
		"PATH" => "/pio_profnastil/crm/button/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/docs/sale/#",
		"RULE" => "",
		"ID" => "bitrix:disk.common",
		"PATH" => "/pio_profnastil/docs/sale/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/productprops/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.productprops",
		"PATH" => "/crm/configs/productprops/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/quote/#",
		"RULE" => "",
		"ID" => "bitrix:crm.quote",
		"PATH" => "/pio_profnastil/crm/quote/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/mailtemplate/#",
		"RULE" => "",
		"ID" => "bitrix:crm.mail_template",
		"PATH" => "/crm/configs/mailtemplate/index.php",
	),
	array(
		"CONDITION" => "#^/bitrix/services/ymarket/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/bitrix/services/ymarket/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/docs/pub/#",
		"RULE" => "",
		"ID" => "bitrix:disk.external.link",
		"PATH" => "/pio_profnastil/docs/pub/extlinks.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/deal/#",
		"RULE" => "",
		"ID" => "bitrix:crm.deal",
		"PATH" => "/pio_profnastil/crm/deal/index.php",
	),
	array(
		"CONDITION" => "#^/partners/personal/order/#",
		"RULE" => "",
		"ID" => "bitrix:sale.personal.order",
		"PATH" => "/partners/personal/order/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil//docs/all#",
		"RULE" => "",
		"ID" => "bitrix:disk.aggregator",
		"PATH" => "/pio_profnastil/docs/index.php",
	),
	array(
		"CONDITION" => "#^/pio_profnastil/crm/lead/#",
		"RULE" => "",
		"ID" => "bitrix:crm.lead",
		"PATH" => "/pio_profnastil/crm/lead/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/automation/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.automation",
		"PATH" => "/crm/configs/automation/index.php",
	),
	array(
		"CONDITION" => "#^/partners/mobile/webdav#",
		"RULE" => "",
		"ID" => "bitrix:mobile.webdav.file.list",
		"PATH" => "/partners/mobile/webdav/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/locations/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.locations",
		"PATH" => "/crm/configs/locations/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/mycompany/#",
		"RULE" => "",
		"ID" => "bitrix:crm.company",
		"PATH" => "/crm/configs/mycompany/index.php",
	),
	array(
		"CONDITION" => "#^/stssync/contacts_crm/#",
		"RULE" => "",
		"ID" => "bitrix:stssync.server",
		"PATH" => "/bitrix/services/stssync/contacts_crm/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/currency/#",
		"RULE" => "",
		"ID" => "bitrix:crm.currency",
		"PATH" => "/crm/configs/currency/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/measure/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.measure",
		"PATH" => "/crm/configs/measure/index.php",
	),
	array(
		"CONDITION" => "#^/partners/workgroups/#",
		"RULE" => "",
		"ID" => "bitrix:socialnetwork_group",
		"PATH" => "/partners/workgroups/index.php",
	),
	array(
		"CONDITION" => "#^/partners/about/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/partners/about/news/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/exch1c/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.exch1c",
		"PATH" => "/crm/configs/exch1c/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/fields/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.fields",
		"PATH" => "/crm/configs/fields/index.php",
	),
	array(
		"CONDITION" => "#^/crm/reports/report/#",
		"RULE" => "",
		"ID" => "bitrix:crm.report",
		"PATH" => "/crm/reports/report/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/preset/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.preset",
		"PATH" => "/crm/configs/preset/index.php",
	),
	array(
		"CONDITION" => "#^/bizproc/processes/#",
		"RULE" => "",
		"ID" => "bitrix:lists",
		"PATH" => "/bizproc/processes/index.php",
	),
	array(
		"CONDITION" => "#^/online/(/?)([^/]*)#",
		"RULE" => "",
		"ID" => "bitrix:im.router",
		"PATH" => "/desktop_app/router.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/perms/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.perms",
		"PATH" => "/crm/configs/perms/index.php",
	),
	array(
		"CONDITION" => "#^/marketplace/local/#",
		"RULE" => "",
		"ID" => "bitrix:rest.marketplace.localapp",
		"PATH" => "/marketplace/local/index.php",
	),
	array(
		"CONDITION" => "#^/partners/personal/#",
		"RULE" => "",
		"ID" => "bitrix:sale.personal.section",
		"PATH" => "/partners/personal/index.php",
	),
	array(
		"CONDITION" => "#^/partners/catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/partners/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/company/personal/#",
		"RULE" => "",
		"ID" => "bitrix:socialnetwork_user",
		"PATH" => "/company/personal.php",
	),
	array(
		"CONDITION" => "#^/marketplace/hook/#",
		"RULE" => "",
		"ID" => "bitrix:rest.hook",
		"PATH" => "/marketplace/hook/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/tax/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.tax",
		"PATH" => "/crm/configs/tax/index.php",
	),
	array(
		"CONDITION" => "#^/timeman/meeting/#",
		"RULE" => "",
		"ID" => "bitrix:meetings",
		"PATH" => "/timeman/meeting/index.php",
	),
	array(
		"CONDITION" => "#^/company/gallery/#",
		"RULE" => "",
		"ID" => "bitrix:photogallery_user",
		"PATH" => "/company/gallery/index.php",
	),
	array(
		"CONDITION" => "#^/marketplace/app/#",
		"RULE" => "",
		"ID" => "bitrix:app.layout",
		"PATH" => "/marketplace/app/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/bp/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.bp",
		"PATH" => "/crm/configs/bp/index.php",
	),
	array(
		"CONDITION" => "#^/crm/configs/ps/#",
		"RULE" => "",
		"ID" => "bitrix:crm.config.ps",
		"PATH" => "/crm/configs/ps/index.php",
	),
	array(
		"CONDITION" => "#^/services/lists/#",
		"RULE" => "",
		"ID" => "bitrix:lists",
		"PATH" => "/services/lists/index.php",
	),
	array(
		"CONDITION" => "#^/pub/site/(.*?)#",
		"RULE" => "path=\$1",
		"ID" => "bitrix:landing.pub",
		"PATH" => "/pub/site/index.php",
	),
	array(
		"CONDITION" => "#^/services/wiki/#",
		"RULE" => "",
		"ID" => "bitrix:wiki",
		"PATH" => "/services/wiki.php",
	),
	array(
		"CONDITION" => "#^/about/gallery/#",
		"RULE" => "",
		"ID" => "bitrix:photogallery",
		"PATH" => "/about/gallery/index.php",
	),
	array(
		"CONDITION" => "#^/crm/invoicing/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/crm/invoicing/index.php",
	),
	array(
		"CONDITION" => "#^/services/idea/#",
		"RULE" => "",
		"ID" => "bitrix:idea",
		"PATH" => "/services/idea/index.php",
	),
	array(
		"CONDITION" => "#^/applications/#",
		"PATH" => "/applications/index.php",
	),
	array(
		"CONDITION" => "#^/mobile/webdav#",
		"RULE" => "",
		"ID" => "bitrix:mobile.webdav.file.list",
		"PATH" => "/mobile/webdav/index.php",
	),
	array(
		"CONDITION" => "#^/about/career/#",
		"PATH" => "/about/career/index.php",
	),
	array(
		"CONDITION" => "#^/services/faq/#",
		"RULE" => "",
		"ID" => "bitrix:support.faq",
		"PATH" => "/services/faq/index.php",
	),
	array(
		"CONDITION" => "#^/crm/activity/#",
		"RULE" => "",
		"ID" => "bitrix:crm.activity",
		"PATH" => "/crm/activity/index.php",
	),
	array(
		"CONDITION" => "#^/services/bp/#",
		"RULE" => "",
		"ID" => "bitrix:bizproc.wizards",
		"PATH" => "/services/bp/index.php",
	),
	array(
		"CONDITION" => "#^/crm/contact/#",
		"RULE" => "",
		"ID" => "bitrix:crm.contact",
		"PATH" => "/crm/contact/index.php",
	),
	array(
		"CONDITION" => "#^/docs/manage/#",
		"RULE" => "",
		"ID" => "bitrix:disk.common",
		"PATH" => "/docs/manage/index.php",
	),
	array(
		"CONDITION" => "#^/\\.well-known#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/bitrix/groupdav.php",
	),
	array(
		"CONDITION" => "#^/crm/webform/#",
		"RULE" => "",
		"ID" => "bitrix:crm.webform",
		"PATH" => "/crm/webform/index.php",
	),
	array(
		"CONDITION" => "#^/crm/company/#",
		"RULE" => "",
		"ID" => "bitrix:crm.company",
		"PATH" => "/crm/company/index.php",
	),
	array(
		"CONDITION" => "#^/marketplace/#",
		"RULE" => "",
		"ID" => "bitrix:rest.marketplace",
		"PATH" => "/marketplace/index.php",
	),
	array(
		"CONDITION" => "#^/crm/product/#",
		"RULE" => "",
		"ID" => "bitrix:crm.product",
		"PATH" => "/crm/product/index.php",
	),
	array(
		"CONDITION" => "#^/crm/invoice/#",
		"RULE" => "",
		"ID" => "bitrix:crm.invoice",
		"PATH" => "/crm/invoice/index.php",
	),
	array(
		"CONDITION" => "#^/docs/shared#",
		"RULE" => "",
		"ID" => "bitrix:disk.common",
		"PATH" => "/docs/shared/index.php",
	),
	array(
		"CONDITION" => "#^/about/news/#",
		"PATH" => "/about/news/index.php",
	),
	array(
		"CONDITION" => "#^/crm/button/#",
		"RULE" => "",
		"ID" => "bitrix:crm.button",
		"PATH" => "/crm/button/index.php",
	),
	array(
		"CONDITION" => "#^/workgroups/#",
		"RULE" => "",
		"ID" => "bitrix:socialnetwork_group",
		"PATH" => "/workgroups/index.php",
	),
	array(
		"CONDITION" => "#^/crm/quote/#",
		"RULE" => "",
		"ID" => "bitrix:crm.quote",
		"PATH" => "/crm/quote/index.php",
	),
	array(
		"CONDITION" => "#^/docs/sale/#",
		"RULE" => "",
		"ID" => "bitrix:disk.common",
		"PATH" => "/docs/sale/index.php",
	),
	array(
		"CONDITION" => "#^/crm/lead/#",
		"RULE" => "",
		"ID" => "bitrix:crm.lead",
		"PATH" => "/crm/lead/index.php",
	),
	array(
		"CONDITION" => "#^/crm/deal/#",
		"RULE" => "",
		"ID" => "bitrix:crm.deal",
		"PATH" => "/crm/deal/index.php",
	),
	array(
		"CONDITION" => "#^/docs/pub/#",
		"RULE" => "",
		"ID" => "bitrix:disk.external.link",
		"PATH" => "/docs/pub/extlinks.php",
	),
	array(
		"CONDITION" => "#^//docs/all#",
		"RULE" => "",
		"ID" => "bitrix:disk.aggregator",
		"PATH" => "/docs/index.php",
	),
	array(
		"CONDITION" => "#^/rest/#",
		"RULE" => "",
		"ID" => "bitrix:rest.provider",
		"PATH" => "/rest/index.php",
	),
    array(
        "CONDITION" => "#^/company/baza/#",
        "PATH" => "/company/baza/index.php",
    ),
);

?>