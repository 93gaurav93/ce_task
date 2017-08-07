<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewCtrl extends Controller
{

    protected $table = 'reviews';

    public function getReview($userId, $candidateId)
    {
        $record = $this->getRecord($userId, $candidateId);

        if (count($record)) {
            return $record->review;
        } else {
            return 0;
        }

    }

    protected function getRecord($userId, $candidateId)
    {
        $record = DB::table($this->table)
            ->where('user_id', $userId)
            ->where('candidate_id', $candidateId)
            ->first();

        return $record;
    }

    public function setReview($userId, $candidateId, Request $request)
    {
        $review = 0;

        if ($request->get('review')) {
            $review = $request->get('review');
        }

        if ($review > 5 or $review < 1) {
            return 0;
        }

        $record = $this->getRecord($userId, $candidateId);

        if (count($record)) {
            $update = DB::table($this->table)
                ->where('user_id', $userId)
                ->where('candidate_id', $candidateId)
                ->update([
                    'review' => $review,
                    'updated_at' => Carbon::now()
                ]);

            if ($update) {
                return $review;
            } else {
                return 0;
            }
        } else {
            $insert = DB::table($this->table)
                ->insert([
                    'user_id' => $userId,
                    'candidate_id' => $candidateId,
                    'review' => $review,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            if ($insert) {
                return $review;
            } else {
                return 0;
            }
        }

    }
}
