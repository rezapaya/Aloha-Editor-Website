<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Aloha, World!</title>
<script>GENTICS_Aloha_base="../../aloha/aloha/";</script>
<script type="text/javascript" src="../../aloha/aloha/aloha.js"></script>
<script type="text/javascript" src="../../aloha/aloha/plugins/com.gentics.aloha.plugins.Format/plugin.js"></script>
<script type="text/javascript" src="../../aloha/aloha/plugins/com.gentics.aloha.plugins.Table/plugin.js"></script>
<script type="text/javascript" src="../../aloha/aloha/plugins/com.gentics.aloha.plugins.List/plugin.js"></script>
<script type="text/javascript" src="../../aloha/aloha/plugins/com.gentics.aloha.plugins.Link/plugin.js"></script>
<script type="text/javascript" src="../../aloha/aloha/plugins/com.gentics.aloha.plugins.HighlightEditables/plugin.js"></script>
<script type="text/javascript" src="../../aloha/aloha/plugins/com.gentics.aloha.plugins.Link/delicious.js"></script>
<script type="text/javascript" src="../../aloha/aloha/plugins/com.gentics.aloha.plugins.Link/LinkList.js"></script>
<script type="text/javascript" src="../../aloha/aloha/plugins/com.gentics.aloha.plugins.Paste/plugin.js"></script>
<script type="text/javascript" src="../../aloha/aloha/plugins/com.gentics.aloha.plugins.Paste/wordpastehandler.js"></script>
<link rel="stylesheet" href="AlohaWorld.css" />

<!-- turn an element into editable Aloha continuous text -->
<script type="text/javascript">
GENTICS.Aloha.settings = {
	logLevels: {'error': true, 'warn': true, 'info': true, 'debug': false},
	errorhandling : false,
	ribbon: false,	
	"i18n": {
		// you can either let the system detect the users language (set acceptLanguage on server)
		// In PHP this would would be '<?=$_SERVER['HTTP_ACCEPT_LANGUAGE']?>' resulting in 
		// "acceptLanguage": 'de-de,de;q=0.8,it;q=0.6,en-us;q=0.7,en;q=0.2'
		// or set current on server side to be in sync with your backend system 
		"current": "en" 
	},
	"repositories": {
	 	"com.gentics.aloha.repositories.LinkList": {
	 		data: [
 		        { name: 'Aloha Developers Wiki', url:'http://www.aloha-editor.com/wiki', type:'website', weight: 0.50 },
 		        { name: 'Aloha Editor - The HTML5 Editor', url:'http://aloha-editor.com', type:'website', weight: 0.90  },
 		        { name: 'Aloha Demo', url:'http://www.aloha-editor.com/demos.html', type:'website', weight: 0.75  },
 		        { name: 'Aloha Wordpress Demo', url:'http://www.aloha-editor.com/demos/wordpress-demo/index.html', type:'website', weight: 0.75  },
 		        { name: 'Aloha Logo', url:'http://www.aloha-editor.com/images/aloha-editor-logo.png', type:'image', weight: 0.10  }
	 		]
		}
	},
	"plugins": {
	 	"com.gentics.aloha.plugins.Format": {
		 	// all elements with no specific configuration get this configuration
			config : [ 'b', 'i','sub','sup'],
		  	editables : {
				// no formatting allowed for title
				'#title'	: [ ], 
				// formatting for all editable DIVs
				'div'		: [ 'b', 'i', 'del', 'sub', 'sup'  ], 
				// content is a DIV and has class .article so it gets both buttons
				'.article'	: [ 'b', 'i', 'p', 'title', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'pre', 'removeFormat']
		  	}
		},
	 	"com.gentics.aloha.plugins.List": { 
		 	// all elements with no specific configuration get an UL, just for fun :)
			config : [ 'ul' ],
		  	editables : {
				// Even if this is configured it is not set because OL and UL are not allowed in H1.
				'#title'	: [ 'ol' ], 
				// all divs get OL
				'div'		: [ 'ol' ], 
				// content is a DIV. It would get only OL but with class .article it also gets UL.
				'.article'	: [ 'ul' ]
		  	}
		},
	 	"com.gentics.aloha.plugins.Link": {
		 	// all elements with no specific configuration may insert links
			config : [ 'a' ],
		  	editables : {
				// No links in the title.
				'#title'	: [  ]
		  	},
		  	// all links that match the targetregex will get set the target
 			// e.g. ^(?!.*aloha-editor.com).* matches all href except aloha-editor.com
		  	targetregex : '^(?!.*aloha-editor.com).*',
		  	// this target is set when either targetregex matches or not set
		    // e.g. _blank opens all links in new window
		  	target : '_blank',
		  	// the same for css class as for target
		  	cssclassregex : '^(?!.*aloha-editor.com).*',
		  	cssclass : 'aloha',
		  	// use all resources of type website for autosuggest
		  	objectTypeFilter: ['website'],
		  	// handle change of href
		  	onHrefChange: function( obj, href, item ) {
			  	if ( item ) {
					jQuery(obj).attr('data-name', item.name);
			  	} else {
					jQuery(obj).removeAttr('data-name');
			  	}
		  	}
		},
	 	"com.gentics.aloha.plugins.Table": { 
		 	// all elements with no specific configuration are not allowed to insert tables
			config : [ ],
		  	editables : {
				// Allow insert tables only into .article
				'.article'	: [ 'table' ] 
		  	}
		}
  	}
};

$(document).ready(function() {
	$('#title').aloha();
	$('#teaser').aloha();
	$('#content').aloha();	
	$('.test').aloha();
});

(function(undefined) {
var update = function() {
	if ( GENTICS && GENTICS.Aloha && GENTICS.Aloha.activeEditable ) {
		$('#current-content').html($('<div/>').text(GENTICS.Aloha.activeEditable.getContents()).html());
	}
	setTimeout(update, 500);
};
setTimeout(update, 500);
})();

</script>
<style>
#current-content{
	float: right;
	margin: 60px 0 30px 0;
	padding: 5px;
	height: 200px;
	width: 200px;
	background-color: #fff;
	overflow:auto;
}
</style>
</head>
<body>
<div id="current-content">content</div>
<div id="main"> 
<div id="tree-div"></div>
<h1 id="title">Aloha, World!</h1>
<div id="bodyContent">
<div class="test"></div>
<div id="teaser" class="shorttext">
<p><b>Aloha</b> in the Hawaiian language means affection, love, peace, compassion and mercy. Since the middle of the 19th century, it also
has come to be used as an English greeting to say <i>goodbye</i> and <i>hello</i>. Currently, it is mostly used in the sense of hello; however,
it is used as the above.</p>
</div>
<div id="content" class="article">
<h2>Etymology</h2>
<p>The word <a href="http://en.wikipedia.org/wiki/Aloha-invalid" target="_blank" class="aloha">aloha</a> derives from the Proto-Polynesian root <i>*qalofa</i>. It has cognates in other Polynesian languages, such as Samoan alofa
and Māori aroha, also meaning "love."</p>
<table>
<caption>with a caption.</caption>
<tr><td>This</td><td>is</td></tr>
<tr><td>a</td><td>table.</td></tr>
</table>
<p>A folk etymology claims that it derives from a compound of the <a href="http://en.wikipedia.org/wiki/Hawaii" target="_blank" class="aloha">Hawaiian</a> words alo meaning "presence", "front", "face", or "share"; and
ha, meaning "breath of life" or "essence of life." Although alo does indeed mean "presence" etc., the word for breath is spelled with a macron
or kahakō over the a (hā) whereas the word aloha does not have a long a.</p>
<h2>Usage</h2>
<p>Before contact with the West, the words used for greeting were welina and anoai. Today, "aloha kakahiaka" is the phrase for "good
morning." "Aloha ʻauinalā" means "good afternoon" and "aloha ahiahi" means "good evening." "Aloha kākou" is a common form of "welcome to all."</p>
<p>In modern Hawaiʻi, numerous businesses have aloha in their names, with more than 3 pages of listings in the Oʻahu phone book alone.</p>
<h2>Trends</h2>
<p>Recent trends are popularizing the term elsewhere in the United States. Popular entertainer, Broadway star and Hollywood actress Bette
Midler, born in Honolulu, uses the greeting frequently in national appearances. The word was also used frequently in the hit television drama
Hawaii Five-O. In the influential 1982 film comedy Fast Times at Ridgemont High, the eccentric teacher Mr. Hand makes use of the greeting. The
Aloha Spirit is a major concept in Lilo and Stitch, a very popular Disney series of movies and TV shows, set in Hawaiʻi. The drama series Lost,
shot in Hawaiʻi, has a thank you note at the end of the credits saying "We thank the people of Hawaiʻi and their Aloha Spirit". Aloha is a term
also used in the Nickelodeon program Rocket Power.</p>
<ul>
	<li>Arguably the most famous historical Hawaiian song, "Aloha ʻOe" was written by the last queen of Hawaii, Liliʻuokalani.</li>
	<li>The term inspired the name of the ALOHA Protocol introduced in the 1970s by the University of Hawaii.</li>
	<li>In Hawaii someone can be said to have or show aloha in the way they treat others; whether family, friend, neighbor or stranger.</li>
</ul>
</div>
</div>
</div>
</body>
</html>
