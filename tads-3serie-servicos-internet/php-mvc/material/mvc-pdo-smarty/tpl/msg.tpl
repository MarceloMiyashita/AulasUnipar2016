{if $msgAviso}
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <ul>
    {foreach from=$msgAviso item='msg'}
    <li>{$msg};</li>
    {/foreach}
    </ul>
</div>
{/if}

{if $msgOk}
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <ul>
    {foreach from=$msgOk item='msg'}
    <li>{$msg};</li>
    {/foreach}
    </ul>
</div>
{/if}