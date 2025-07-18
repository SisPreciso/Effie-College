<?php

namespace App\Traits;

use App\Answer;
use App\Question;
use App\Section;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

trait ProposalTrait
{
    /**
     * @param int|null $userId
     * @return array
     */
    protected function getData(int $userId = null): array
    {
        /** @var User $user */
        $user = User::with(['caso.edition', 'caso.brand', 'reviewsLikeTeam'])->find($userId ?? auth()->id());
        // dd($user);
        $userSections = Section::with([
            'questions' => function ($query) {
                /** @var Builder $query */
                $query->where('code', 'not like', '%TTL%');
            },
            'questions.answers' => function ($query) use ($user) {
                /** @var Builder $query */
                $query->where('user_id', $user->id);
            },
        ])->where('code', 'like', "%{$user->caso->edition->name}%");
        
        // dd($userSections);

        /** @var Collection $sections */
        $sections = $userSections->get();
        // dd($sections);

        /** @var Section $lastSection */
        $lastSection = $userSections->where('code', /*now()->year .*/ 'Q2024S5A')->first();
        
        // $lastSection = $userSections->where('code',now()->year.'S5')->first();
        
        //dd($lastSection);
        
        /** @var Question $questionTitleProposal */
        $questionTitleProposal = Question::where('section_id', $lastSection->id)->where('code', 'like', '%TTL%')->first();

        /** @var Answer $answerTitleProposal */
        $answerTitleProposal = Answer::where('question_id', $questionTitleProposal->id)->where('user_id', $user->id)->first();

        $data = [];
        $letters = ['a', 'b', 'c', 'd', 'e'];

        foreach ($sections as $index => $section) {
            if (!Str::contains($section->code, 'S5')) {
                $number = $index + 1;

                foreach ($section->questions as $key => $question) {
                    $data[] = "{$number}{$letters[$key]}";
                }
            }
        }

        return compact('user', 'userSections', 'sections', 'lastSection', 'questionTitleProposal', 'answerTitleProposal', 'data');
    }
}
