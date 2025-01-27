<?php

namespace App\Enums;    

enum HttpMethod: string {
    case GET = 'get';
    case POST = 'post';
    case PUT = 'put';
    
}