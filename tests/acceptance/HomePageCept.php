<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage("/");

$I->amGoingTo("enter invalid phone number");
$I->seeElement('#username');
$I->seeElement("#password");
$I->fillField("#username", "incorrect phone number");
$I->click("login");

$I->see('Verkeerd telefoonnummer, PIN of account is afgesloten.', '#loginBoxPassword .alert.alert-error');

$I->amGoingTo("to eneter valid phone number");
$I->fillField('#username', "56955600");
$I->see('56955600', '#username');
$I->click("login");
$I->see("Verkeerd telefoonnummer of PIN of telefoonnummer is niet bekend. Let op, log in met landcode (316...).",
	"#loginBoxPassword .alert.alert-error");

