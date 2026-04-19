<?php
namespace App\Enum;
enum EnumStatus: string{
    case Active = "1";
    case Deactive = "0";

/*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Get the label of the status.
     *
     * @return string
     */
/*******  f8cecbf1-2886-40ab-8cb6-3dd299a50fc9  *******/
    public function label(){
        return match($this){
            EnumStatus::Active =>"Published",
            EnumStatus::Deactive => "Unpublished"
        };
    }
/*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Returns the color associated with the status.
     *
     * @return string the color associated with the status
     */
/*******  3a6a45cb-79a7-4522-9a2d-748c1f9634ee  *******/
    public function color(){
        return match($this){
            EnumStatus::Active =>"green",
            EnumStatus::Deactive => "red"
        };
    }
}