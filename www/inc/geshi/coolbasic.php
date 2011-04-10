<?php
/*************************************************************************************
 * coolbasic.php
 * --------------
 * Author: Jasse "KilledWhale" Lahdenperä and Vesa "VesQ" Laakso
 * Copyright: (c) 2020 Jasse Lahdenperä
 * Release Version: 1.0.0.0
 * Date Started: 15.07.2010
 *
 * CoolBasic language file for GeSHi.
 *
 * It is a simple Basic dialect made for game programming.
 *
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

$language_data = array (
    'LANG_NAME' => 'CoolBasic',
    'COMMENT_SINGLE' => array(1 => '//', 2 => '\''),
    'COMMENT_MULTI' => array(
                            'RemStart' => 'RemEnd'
                            ),
    'CASE_KEYWORDS' => GESHI_CAPS_NO_CHANGE,
    'QUOTEMARKS' => array('"'),
    'ESCAPE_CHAR' => '',
    'KEYWORDS' => array(
        1 => array(
            'And','BLUE','Byte','Case','Default','Else','ElseIf','EndFunction','End Function','EndIf','End If','EndSelect',
            'End Select', 'EndType','End Type','False','Forever','GREEN','Integer','Next','Not','NULL','OFF','ON','Or','PI',
            'RED','Short','Step','Then','To','True','Until','Xor'
        ),
        2 => array(
            'Abs','ACos','AddText','After','AnimationHeight','AnimationPlaying','AnimationWidth',
            'As','Asc','ASin','ATan','Before','Bin','Box','BoxOverlap',
            'CallDLL','CameraAngle','CameraFollow','CameraPick','CameraX','CameraY','CenterText','ChDir',
            'Chr','Circle','ClearArray','ClearCollisions','ClearKeys','ClearMouse','ClearObjects','ClearText',
            'CloneCameraOrientation','CloneCameraPosition','CloneImage','CloneObject','CloneObjectOrientation',
            'CloneObjectPosition','CloseFile','CloseInput','Cls','ClsColor','CollisionAngle','CollisionX','CollisionY',
            'Color','CommandLine','Const','ConvertToInteger','ConvertToType','CopyBox','CopyFile','Cos','CountCollisions',
            'CountWords','Crc32','CurrentDir','CurveAngle','CurveValue','Data','Date','Decrypt','DefaultMask',
            'DefaultVisible','Delete','DeleteFile','DeleteFont','DeleteImage','DeleteMEMBlock','DeleteObject','DeleteSound',
            'Dim','Distance','Distance2','Dot','DownKey','DrawAnimation','DrawGame','DrawGhostImage','DrawImage','DrawImageBox',
            'DrawScreen','DrawToImage','DrawToScreen','DrawToWorld','Each','EditMap','Ellipse','Encrypt','End','EndSearch',
            'EOF','Errors','EscapeKey','Execute','Exit','Field',
            'FileExists','FileOffset','FileSize','FindFile','First','Flip','Float','For','FPS','FrameLimit','Function',
            'GetAngle','GetAngle2','GetCollision','GetEXEName','GetKey','GetMap','GetMap2','GetMouse','GetPixel','GetPixel2',
            'getRGB','GetWord','GFXModeExists','GhostObject','Global','Gosub','Goto','GotoSavedLocation','Hex','HotSpot',
            'If','Image','ImageHeight','ImagesCollide','ImagesOverlap','ImageWidth','Include','InitObjectList','Input','Insert',
            'InStr','Int','IsDirectory','KeyDown','KeyHit','KeyUp','Last','Left','LeftKey','Len','Line','LoadAnimImage',
            'LoadAnimObject','LoadFont','LoadImage','LoadMap','LoadObject','LoadProgram','LoadSound','Locate','Lock','Log','Log10',
            'LoopObject','Lower','LSet','MakeDir','MakeEmitter','MakeError','MakeImage','MakeMap','MakeMEMBlock','MakeObject',
            'MakeObjectFloor','MapHeight','MapWidth','MaskImage','MaskObject','Max','MEMBlockSize','MemCopy','Min','Mid',
            'MirrorObject','Mod','MouseDown','MouseHit','MouseMoveX','MouseMoveY','MouseMoveZ','MouseUp','MouseWX','MouseWY',
            'MouseX','MouseY','MouseX','MoveCamera','MoveObject','New','NextObject','ObjectAngle','ObjectFloat',
            'ObjectFrame','ObjectInteger','ObjectLife','ObjectOrder','ObjectPick','ObjectPickable','ObjectPlaying','ObjectRange',
            'ObjectSight','ObjectSizeX','ObjectSizeY','ObjectsOverlap','ObjectString','ObjectX','ObjectY','OpenToEdit',
            'OpenToRead','OpenToWrite','PaintObject','ParticleAnimation','ParticleEmission','ParticleMovement','PeekByte',
            'PeekFloat','PeekInt','PeekShort','PickColor','PickedAngle','PickedObject','PickedX','PickedY','PickImageColor',
            'PickImageColor2','PixelPick','PlayAnimation','PlayObject','PlaySound','PointCamera','PointObject','PokeByte',
            'PokeFloat','PokeInt','PokeShort','PositionCamera','PositionMouse','PositionObject','Print','PutPixel','PutPixel2',
            'Rand','Randomize','Read','ReadByte','ReadFloat','ReadInt','ReadLine','ReadShort','ReadString','ReDim',
            'Repeat','Replace','ResetObjectCollision','ResizeImage','ResizeMEMBlock','Restore','Return','Right','RightKey',
            'Rnd','RotateCamera','RotateImage','RotateObject','RoundDown','RoundUp','RSet','SAFEEXIT','Sar','SaveImage',
            'SaveProgram','SCREEN','ScreenDepth','ScreenGamma','ScreenHeight','ScreenPositionObject','ScreenShot','ScreenWidth',
            'SeekFile','Select','SetFont','SetMap','SetSound','SetTile','SetupCollision','SetWindow','Shl','ShowMouse',
            'ShowObject','Shr','Sin','Smooth2D','SoundPlaying','Sqrt','StartSearch','StopAnimation','StopObject','StopSound',
            'Str','String','StrInsert','StrMove','StrRemove','Tan','Text','TextHeight','TextWidth','Time','Timer',
            'TranslateCamera','TranslateObject','Trim','TurnCamera','TurnObject','Type','Unlock','UpdateGame',
            'UpKey','Upper','VerticalText','Wait','WaitKey','WaitMouse','Wend','While','WrapAngle','Write','WriteByte','WriteFloat',
            'WriteInt','WriteLine','WriteShort','WriteString'
            )
        ),
    'SYMBOLS' => array(
        '(',')','+','-','<','>','/','*','^','='
        ),
    'CASE_SENSITIVE' => array(
        GESHI_COMMENTS => true,
        1 => false,
        2 => false,
        ),
    'STYLES' => array(
        'KEYWORDS' => array(
            1 => 'color: #0000CA; font-weight: bold;',
            2 => 'color: #0000CA; font-weight: bold;',
            ),
        'COMMENTS' => array(
            1 => 'color: #A6A6A6;',
            2 => 'color: #A6A6A6;',
            'MULTI' => 'color: #A6A6A6;'
            ),
        'ESCAPE_CHAR' => array(
            0 => 'color: #000099; font-weight: bold;'
            ),
        'BRACKETS' => array(
            0 => 'color: #0C5785;'
            ),
        'STRINGS' => array(
            0 => 'color: #00B000;'
            ),
        'NUMBERS' => array(
            0 => 'color: #D74600;'
            ),
        'METHODS' => array(
            1 => 'color: #FF00FF;'
            ),
        'SYMBOLS' => array(
            0 => 'color: #0C5785;'
            ),
        'REGEXPS' => array(
            0 => ''
            ),
        'SCRIPT' => array(
            0 => '',
            1 => '',
            )
        ),
    'URLS' => array(
        1 => '',
        2 => '/cbmanual/commands/{FNAMEL}.html'
        ),
    'OOLANG' => false,
    'OBJECT_SPLITTERS' => array(
        1 => '\\'
        ),
    'REGEXPS' => array(
        0 => "[\\$]{1,2}[a-zA-Z_][a-zA-Z0-9_]*"
        ),
    'STRICT_MODE_APPLIES' => GESHI_NEVER,
    'SCRIPT_DELIMITERS' => array(),
    'HIGHLIGHT_STRICT_BLOCK' => array(
        0 => false,
        1 => false
        )
);

?>
