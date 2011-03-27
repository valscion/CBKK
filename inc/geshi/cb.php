<?php
/*************************************************************************************
 * cb.php
 * ---------------------------------
 * Author: Jaakko Rinta-Filppula (friiki911@hotmail.com)
 * Copyright: (c) 2010 Jaakko Rinta-Filppula (<website URL>)
 * Release Version: 1.0.0.0
 * Date Started: 22.08.2010
 *
 * CoolBasic language file for GeSHi.
 *
 * <any-comments...>
 *
 * CHANGES
 * -------
 * <date-of-release> (<GeSHi release>)
 *  -  First Release
 *
 * TODO (updated <date-of-release>)
 * -------------------------
 * <things-to-do>
 *
 *************************************************************************************
 *
 *     This file is part of GeSHi.
 *
 *   GeSHi is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   GeSHi is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *   You should have received a copy of the GNU General Public License
 *   along with GeSHi; if not, write to the Free Software
 *   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 ************************************************************************************/

$language_data = array(
	'LANG_NAME' => 'CB',
	'COMMENT_SINGLE' => array(1 => '//', 2 => "'"),
	'COMMENT_MULTI' => array('remstart' => 'remend'),
	'CASE_KEYWORDS' => GESHI_CAPS_NO_CHANGE,
	'QUOTEMARKS' => array('"'),
	'ESCAPE_CHAR' => '\\',
	'NUMBERS' => GESHI_NUMBER_INT_BASIC,
	
	'KEYWORDS' => array(
		1 => array(
			'and','as','byte','case','const','default','delete','dim',
			'each','else','elseif','end','endfunction','endif','endselect',
			'endtype','false','field','float','for','forever','function','global',
			'gosub','goto','if','int','include','mod','next','not','or',
			'repeat','sar','select','shl','short','shr','step',
			'string','then','to','true','type','until','wend','while','xor'
			),
		2 => array('BLUE','GREEN','NULL','OFF','ON','PI','RED'),
		3 => array(
			'abs','acos','addtext','after','animationheight','animationplaying',
			'animationwidth','asc','asin','atan','before','bin','box','boxoverlap',
			'calldll','cameraangle','camerax','cameray','chr','cloneimage','cloneobect',
			'collisionangle','collisionx','collisiony','commandline','convertointeger',
			'convertotype','cos','countcollisions','countwords','crc32','currentdir',
			'curveangle','curvevalue','date','distance','distance2','downkey',
			'eof','escapekey','fileexists','fileoffset','filesize','findfile',
			'first','flip','fps','getangle','getangle2','getcollision',
			'getexename','getkey','getmap','getmap2','getmouse','getpixel',
			'getpixel2','getrgb','getword','gfxmodeexists','hex','image','imageheight',
			'imagescollide','imagesoverlap','imagewidth','input','instr',
			'isdirectory','keydown','keyhit','keyup','last','left','leftkey','len',
			'loadanimimage','loadanimobject','loadfont','loadimage','loadmap','loadobject',
			'loadprogram','loadsound','log','log10','lower','lset','makeemitter','makeimage',
			'makemap','makememblock','makeobect','makeobjectfloor','mapheight','mapwidth',
			'max','memblocksize','min','mid','mirrorobject','mousedown','mousehit',
			'mousemovex','mousemovey','mousemovez','mouseup','mousewx','mousewy','mousex',
			'mousey','mousez','new','nextobject','objectangle','objectfloat','objectframe',
			'objectinteger','objectlife','objectorder','objectplaying','objectsight',
			'objectsizex','objectsizey','objectsoverlap','objectx','objecty','opentoedit',
			'opentoread','opentowrite','peekbyte','peekfloat','peekint','peekshort',
			'pickedangle','pickedobject','pickedx','pickedy','rand','read','readbyteä',
			'readfloat','readint','readline','readshort','readstring','replace','right',
			'rightkey','rnd','rounddown','ruondup','rset','screendepth','screenheight',
			'screenwidth','sin','soundplaying','sqrt','str','string','strinsert',
			'strmove','strremove','tan','textheight','textwidth','time','timer','trim',
			'upkey','upper','wrapangle'
			),
		4 => array(
			'centertext','chdir','circle','cleararray','clearcollisions','clearkeys',
			'clearmouse','clearobjects','cleartext','clonecameraorientation',
			'clonecameraposition','closefile','closeinput','cls','clscolor','color',
			'copybox','copyfile','data','decrypt','deafaultmask','defaultvisible','deletefile',
			'deletefont','deleteimage','deletememblock','deleteobject','deletesound','dot',
			'drawanimation','drawgame','drawghostimage','drawimage','drawimagebox','drawscreen',
			'drawtoimage','drawtoscreen','drawtoworld','editmap','ellipse','encrypt','endsearch',
			'errors','execute','exit','framelimit','ghostobject','gotosavedlocation',
			'hotspot','initobjectlist','line','locate','lock','makedir','makeerror',
			'maskimage','maskobject','memcopy','movecamera','moveobject','objectpick',
			'objectpickable','paintobject','particleanimation','particleemission',
			'particlemovement','pickcolor','pickimagecolor','pickimagecolor2','pixelpick',
			'playanimation','playobject','playsound','pointcamera','pointobject','pokebyte',
			'pokefloat','pokeint','pokeshort','positioncamera','positionmouse','positionobject',
			'print','putpixel','putpixel2','randomize','resetobjectcollision','resizeimage',
			'resizememblock','restore','return','rotatecamera','rotateimage','rotateobject',
			'saveimage','saveprogram','screen','screengamma','screenpositionobject',
			'screenshot','seekfile','setfont','setmap','setsound','settile','setupcollision',
			'setwindow','showmouse','showobject','smooth2d','startsearch','stopanimation',
			'stopobject','stopsound','text','translatecamera','translateobject','turncamara',
			'turnobject','unlock','updategame','verticaltext','wait','waitkey','waitmouse',
			'writebyte','writefloat','writeint','writeline','writeshort','writestring'
			)
		),
		
	'SYMBOLS' => array(
		'(',')','+','-','*','/','^','=','<','>'
		),
		
	'CASE_SENSITIVE' => array(
		GESHI_COMMENTS => false,
		1 => false,
		2 => false,
		3 => false,
		4 => false
		),
			
	'STYLES' => array(
		'KEYWORDS' => array(
			1 => 'color: #0000CA;',
			2 => 'color: #0000CA;',
			3 => 'color: #0000CA;',
			4 => 'color: #0000CA;',
			),
		'COMMENTS' => array(
			1 => 'color: #A6A6A6;',
			2 => 'color: #A6A6A6;',
			'MULTI' => 'color: #A6A6A6;'
			),
		'ESCAPE_CHAR' => array(
			0 => ''
			),
		'BRACKETS' => array(
			0 => ''
			),
		'STRINGS' => array(
			0 => 'color: #00B000;'
			),
		'NUMBERS' => array(
			0 => 'color: #D74600;'
			),
		'SYMBOLS' => array(
			0 => 'color: #0C5785;'
			),
		'REGEXPS' => array(
			0 => ''
			),
		'SCRIPT' => array(
			0 => ''
			)
		),
	
	'URLS' => array(
		1 => '',
		2 => '',
		3 => '',
		4 => ''
		),
	
	'OOLANG' => false,
	
	'REGEXPS' => array(
		0 => "[\\$]{1,2}[a-zA-Z_][a-zA-Z0-9_]*"
		),
	
	'STRICT_MODE_APPLIES' => GESHI_NEVER,
	
	'TAB_WIDTH' => 4
	);
	
?>