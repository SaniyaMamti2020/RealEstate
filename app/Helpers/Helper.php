<?php

namespace App\Helpers;

use DB;
use Auth;
use Log;
use Session;
use Carbon\Carbon;
use App\Models\{Category};

class Helper
{
    public static function getChildData($member_id, $des = 0, $selectedParentId = null, $not_memberId = null)
    {
        if($not_memberId != null)
        {
            $parentMember = Category::where('status', 1)->where('parent_id', $member_id)->where('id', '!=', $not_memberId)->pluck('name', 'id');
        } else {
            $parentMember = Category::where('status', 1)->where('parent_id', $member_id)->pluck('name', 'id');
        }
        $redata = '';
        
        foreach ($parentMember as $m_id => $m_name)
        {
            // dd($m_id);
            $prefix = str_repeat('-', $des);
            $selected = $m_id == $selectedParentId ? 'selected' : '';

            $redata .= '<option value="'. $m_id .'" '. $selected .'>'. $prefix . ' ' . $m_name .'</option>';
            $redata .= self::getChildData($m_id, $des + 1, $selectedParentId, $not_memberId);
        }

        return $redata;
    }

    public static function getChildDataId($member_id, $des = 0, $selectedParentId = null)
    {
        
        $parentMember = Category::where('status', 1)->where('parent_id', $member_id)->pluck('name', 'id');
        $redata = '';
        
        foreach ($parentMember as $m_id => $m_name)
        {
            $prefix = str_repeat('-', $des);
            $selected = $m_id == $selectedParentId ? 'selected' : '';

            $redata .= '<option value="'. $m_id .'" '. $selected .'>'. $prefix . ' ' . $m_name .'</option>';
            $redata .= self::getChildData($m_id, $des + 1, $selectedParentId);
        }

        return $redata;
    }

    // public static function isRelatedToAuthUser($memberId)
    // {
    //     $authUserId = Auth::id();

    //     if ($memberId == 0) {
    //         $hasChildren = Category::where('parent_id', $authUserId)->exists();
    //         return $hasChildren;
    //     }

    //     $member = Category::where('id', $memberId)
    //         ->where(function ($query) use ($authUserId) {
    //             $query->where('parent_id', $authUserId)
    //                   ->orWhereHas('childs', function ($childQuery) use ($authUserId) {
    //                       $childQuery->where('parent_id', $authUserId);
    //                   });
    //         })
    //         ->exists();

    //     return $member;
    // }
}