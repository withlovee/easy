<?php

class ItemQuestion extends Eloquent
{
	protected $table = 'item_questions';
	protected $fillable = array('content','answer','itemId','userId');

	public $timestamps = false;
	public $errors;

	public function scopeListByItem($query, $id){
		return $query->where('itemId', '=', $id)->orderBy('id', 'ASC');
	}

	public function scopeListAnsweredByItem($query, $id){
		return $query->where('itemId', '=', $id)->where('answer','!=','')->orderBy('id', 'ASC');
	}

	public function item(){
		return $this->belongsTo('Item','itemId');
	}

	public function user(){
		return $this->belongsTo('User','userId');
	}

	static public function createItemQuestion($input){
		$input['userId'] = Auth::user()->id;
		$input['itemId'] = $input['id'];
		$input['answer'] = '';
		$question = self::create($input);
		return $question;
	}

	static public function answer($input){
		$question = self::find($input['id']);
		$question->answer = $input['answer'];
		$question->save();
		return $question;
	}
	
}