# pat-referrers

Textpattern CMS plugin

> "This is not a WordPress plugin."
- Magritte

Redirect to specific section your known referrers.

This TXP plugin had been done from my article on [txp-fr community website](http://txp-fr.net/2012/02/09/display-a-page-on-your-website-for-known-referrers) and a request by [Lawrence](http://txp-fr.net/2012/02/09/display-a-page-on-your-website-for-known-referrers/comments#c000031). It supports multiple website inbound links (see list attribute below) and makes distinction upon domains and sub domain names for referrers and also page into Urls (ie. http://domain.com/some-page.html).
Purpose

For maketing - or personal - reasons, you could wish to redirect your visitors which come from others websites you made when they click on your personal TXP website Url (inbound links). The only thing you need before using this plugin, is to have your personal TXP website Url on external websites (i.e. http://my-domain.com shown on textpattern.com).

## Installation & usage

Install this plugin as always into your TXP admin interface, then activate it.

Place the only one tag available in the very top of your "default" page as this:

    <txp:pat_referrers list="" separator="," redirect="" external="" status="" default=""/>

## Attributes

* `list`: string [required], a comma separated list of website Urls. Default: empty.
* `separator`: string [optional], separator sign used into the list above. Default: "," (comma).
* `redirect`: [optional] section name of your redirection for referrers listed in the "list" attribute above. Default: empty.
* `status`: boolean [optional], if set to 1 a "301 Moved Permanently" status is send. Useful to tell search engine bots that the TXP section must never more to be indexed. Note: in this case, redirect attribute must to be set. Default: 0 (no status send)
* `default`: string [optional], your default section name for all other visitors they don't came from websites listed in the "list" above. Default: empty = your main "default" TXP page.
* `external`: Url [optional], a full external website Url to redirect your visitors (i.e. http://google.com as external website address). Default: empty.



[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/cara-tm/pat-referrers/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

