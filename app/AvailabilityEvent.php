<?php

namespace App;

use BinaryCabin\LaravelUUID\Traits\HasUUID;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class AvailabilityEvent extends Model implements \MaddHatter\LaravelFullcalendar\Event
{

    use HasUUID;

    protected $fillable = [
        'uuid',
        'type',
        'name',
        'description',
        'is_all_day',
        'is_repeatable',
        'start_at',
        'end_at',
        'repeat_type',
        'repeat_end_at',
        'rule_id',
        'rule_increase_percentage'
    ];

    protected $dates = [
        'start_at',
        'end_at',
        'repeat_end_at',
    ];

    public function getTitle()
    {
        return $this->name;
    }

    public function isAllDay()
    {
        return (bool)$this->is_all_day;
    }

    public function getStart()
    {
        return $this->start_at;
    }

    public function getEnd()
    {
        return $this->end_at;
    }

    public function getEventOptions()
    {
        return [
            //'color' => '#ff0000',
            'url' => url('/manage/availability/'.$this->uuid.'/edit'),
            'daysOfWeek' => [1,3,4,5,6],
            'startRecur'=>$this->start_at,
        ];
    }

    public static function prepareDataForSave($data){
        if(!empty($data['start_at_year'])){
            $data['start_at'] = static::getDateFromParts($data,'start_at_');
        }
        if(!empty($data['end_at_year'])){
            $data['end_at'] = static::getDateFromParts($data,'end_at_');
        }
        if(!empty($data['repeat_end_at_year'])){
            $data['repeat_end_at'] = static::getDateFromParts($data,'repeat_end_at_');
        }
        return $data;
    }

    public static function getDateFromParts($parts,$fieldPrefix){
        $year = $parts[$fieldPrefix.'year'];
        $month = $parts[$fieldPrefix.'month'];
        $day = $parts[$fieldPrefix.'day'];
        $hour = $parts[$fieldPrefix.'hour'];
        $minute = $parts[$fieldPrefix.'minute'];
        $ampm = $parts[$fieldPrefix.'ampm'];
        if(strtolower($ampm) == 'pm'){
            $hour += 12;
        }
        return \Carbon\Carbon::parse($year.'-'.$month.'-'.$day.' '.$hour.':'.$minute);
    }

    public function getStartAtDayAttribute(){
        return $this->start_at->format('d');
    }

    public function getStartAtMonthAttribute(){
        return $this->start_at->format('m');
    }

    public function getStartAtYearAttribute(){
        return $this->start_at->format('Y');
    }

    public function getStartAtHourAttribute(){
        return $this->start_at->format('g');
    }

    public function getStartAtMinuteAttribute(){
        return $this->start_at->format('i');
    }

    public function getStartAtAmpmAttribute(){
        return $this->start_at->format('A');
    }

    public function getEndAtDayAttribute(){
        return $this->end_at->format('d');
    }

    public function getEndAtMonthAttribute(){
        return $this->end_at->format('m');
    }

    public function getEndAtYearAttribute(){
        return $this->end_at->format('Y');
    }

    public function getEndAtHourAttribute(){
        return $this->end_at->format('g');
    }

    public function getEndAtMinuteAttribute(){
        return $this->end_at->format('i');
    }

    public function getEndAtAmpmAttribute(){
        return $this->end_at->format('A');
    }

    public function getRepeatEndAtDayAttribute(){
        return $this->repeat_end_at->format('d');
    }

    public function getRepeatEndAtMonthAttribute(){
        return $this->repeat_end_at->format('m');
    }

    public function getRepeatEndAtYearAttribute(){
        return $this->repeat_end_at->format('Y');
    }

    public function getRepeatEndAtHourAttribute(){
        return $this->repeat_end_at->format('g');
    }

    public function getRepeatEndAtMinuteAttribute(){
        return $this->repeat_end_at->format('i');
    }

    public function getRepeatEndAtAmpmAttribute(){
        return $this->repeat_end_at->format('A');
    }

}
