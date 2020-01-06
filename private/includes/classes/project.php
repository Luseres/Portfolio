<?php

class Project
{
    private $id;
    public $team;
    public $name;
    public $subtitle;
    public $information;
    public $thumbnail;
    public $github;
    public $live;
    public $task_information;

    public function __construct($id)
    {
        $this->id = $id;
        $this->team = [];
        $this->name = "No name set";
        $this->subtitle = "No subtitle set";
        $this->information = "No information set";
        $this->thumbnail = "No thumbnail set";
        $this->github = "/";
        $this->live = "/";
        $this->task_information = "No task information set";

        $this->loadProject($id);
    }

    private function loadProject($id)
    {
        $json = file_get_contents("./private/data/projects.json");
        $decoded = json_decode($json, true);
        foreach ($decoded as $project) {
            if ($project['id'] == $id) {
                $this->name = $project['name'];
                $this->subtitle = $project['subtitle'];
                $this->information = $project['information'];
                $this->thumbnail = $project['thumbnail'];
                $this->task_information = $project['task_information'];
                $this->github = $project['github'];
                $this->live = $project['live'];
                $this->team = $project['team'];
            }
        }
    }
}
