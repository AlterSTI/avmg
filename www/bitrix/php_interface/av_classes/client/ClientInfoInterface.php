<?
namespace Av\Client;

interface ClientInfoInterface
{
	public function setBrowserChecking(string $browserName = '', float $minBrowserVersion = 0);
	public function getBrowsersCheckingParams();
	public function isOld();
}