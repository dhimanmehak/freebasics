<?php

use fundstarter\storage\Project\ProjectRepository as ProjectRepository;
use fundstarter\storage\Comment\CommentRepository as CommentRepository;
use fundstarter\storage\User\UserRepository as UserRepository;

class CommentController extends BaseController {

    public function __construct(ProjectRepository $projectRepository, CommentRepository $commentRepository, UserRepository $userRepository) {
        $this->project = $projectRepository;
        $this->comment = $commentRepository;
        $this->user = $userRepository;
    }

    public function index() {
        $projects = $this->project->getliveandexpiredprojects();
        return View::make('adminviews.comment.viewaddcomments', compact('projects'));
    }

    public function commentlist() {
        $projectid = Input::get('projectid');
        $comments = $this->comment->getbyprojectid($projectid);
        return View::make('adminviews.comment.commentlist', compact('comments'));
    }

    public function addcomment() {
        $projectid = Input::get('projectid');
        $projecttitle = $this->project->getprojecttitlebyid($projectid);
        $users = $this->user->getverifiedusers();
        return View::make('adminviews.comment.addcomment', compact('projectid', 'projecttitle', 'users'));
    }
    
    public function adminpostcomment(){
        $input=Input::all();
        $this->comment->create($input);
        Session::flash('success', 'Comment added successfully');
        return Redirect::to('commentlist?projectid=' . $input['projectid']);
    }

    public function viewcomment() {
        $id = Input::get('id');
        $comment = $this->comment->getdetailsbyid($id);
        return View::make('adminviews.comment.viewcomment', compact('comment'));
    }

    public function editcomment() {
        $id = Input::get('id');
        $comment = $this->comment->getdetailsbyid($id);
        return View::make('adminviews.comment.editcomment', compact('comment'));
    }

    public function deletecomment() {
        $id = Input::get('id');
        $this->comment->deletebyid($id);
        Session::flash('success', 'Comment deleted successfully');
        return Redirect::back();
    }

    public function posteditcomment() {
        $input = Input::all();
        $projectid = $this->comment->updatecomment($input);
        Session::flash('success', 'Comment updated successfully');
        return Redirect::to('commentlist?projectid=' . $projectid);
    }

}
