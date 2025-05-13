<?php

class Example
{
    /** Permissão total */
    public string $publicText;

    /** 
     * Pode acessar fora da classe? ❌
     * Pode ser lido/modificado na própria classe ou subclasses? ✅
     */
    protected string $protectedText;

    /** 
     * Pode acessar fora da classe? ❌
     * Pode ser lido/modificado em subclasses? ❌
     */
    private string $privateText;
}

$example = new Example();
