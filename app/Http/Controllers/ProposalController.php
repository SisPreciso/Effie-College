<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Section;
use App\Traits\ProposalTrait;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProposalController extends Controller
{
    use ProposalTrait;

    /**
     * @return Application|Factory|View
     */
    public function createOrEdit()
    {
        return view('new.proposals.create-or-edit', $this->getData());
    }

    /**
     * @return Application|Factory|View
     */
    public function advance()
    {
        $user = $this->getData()['user'];
        //dd($user);
        $sections = $this->getData()['sections'];
        $questionTitleProposal = $this->getData()['questionTitleProposal'];
        $answerTitleProposal = $this->getData()['answerTitleProposal'];

        return view('new.proposals.advance', compact('user', 'sections', 'questionTitleProposal', 'answerTitleProposal'));
    }
}
