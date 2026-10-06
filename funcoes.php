<?php
    function idade($dtnascto) {
        $hoje = new DateTime();
        $nascimento = new DateTime($dtnascto);
        $idade = $nascimento->diff($hoje);

        return $idade->format('%y');
    }
?>