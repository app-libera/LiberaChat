<div class="wrap">
   <h1>Configuring APP LiberaChat</h1>
 <form method="POST" action="options.php">
            <?php
                settings_fields('liberachat-reg');
                do_settings_sections('liberachat-reg');
            ?>
    <table class="form-table"> 
     <tr valign="top">
      <th scope="row">
       <label for="liberachat_server"> Connected from:</label>
	  </th>
	 <td>	
      <input type="text" style="width: 200px" name="liberachat_server" id="liberachat_server" value="https://web.libera.chat" disabled="1" maxlength="10" /> <a href="https://libera.chat" target="_blank" title="Libera.Chat">Libera.Chat</a> the IRC network for free & open source software
     </td> 
	 </tr> 
	</table>
	<table class="form-table"> 
     <tr valign="top">
      <th scope="row">
       <label for="liberachat_nick">Nick Suggestion</label>
	  </th>
	 <td>                
	  <input  type="text" style="width: 120px" name="liberachat_nick" id="liberachat_nick" value="<?php echo get_option('liberachat_nick'); ?>"/> Default nickname for your chatroom's LiberaChat. <a title="? is replaced with 3 random numbers">(Default is Guest?)</a>
     </td>   
     </tr>  
    </table>	 
	<table class="form-table"> 
	  <tr valign="top">
		<th scope="row">
			<label for="liberachat_chan"> Channel to room:</label>
	    </th>
       <td>
	    <input  type="text" style="width: 120px" name="liberachat_chan" id="liberachat_chan" value="<?php echo get_option('liberachat_chan'); ?>"/> The name of your chatroom. ( Default is #Libera )  
	   </td>	
	  </tr>  
	</table>
	<table class="form-table"> 		
	 <tr valign="top">
	 <th scope="row">
        <label for="liberachat_style">Select Themes:</label>
	 </th>
     <td>
	    <select name="liberachat_style" id="liberachat_style">
			   <option value="default" <?php selected(get_option('liberachat_style'), "default"); ?>>Default</option>
			   <option value="osprey" <?php selected(get_option('liberachat_style'), "osprey"); ?>>Osprey</option>
			   <option value="radioactive" <?php selected(get_option('liberachat_style'), "radioactive"); ?>>Radioactive</option>
	           <option value="dark" <?php selected(get_option('liberachat_style'), "dark"); ?>>Dark</option>
               <option value="nightswatch" <?php selected(get_option('liberachat_style'), "nightswatch"); ?>>Nightswatch</option>
               <option value="sky" <?php selected(get_option('liberachat_style'), "sky"); ?>>Sky</option>
			   <option value="coffee" <?php selected(get_option('liberachat_style'), "coffee"); ?>>Coffee</option>
			   <option value="grayfox" <?php selected(get_option('liberachat_style'), "grayfox"); ?>>GrayFox</option>
        </select>
	 Color style of the chatroom. (Default is Default)
     </td>	
	 </tr>  
	</table>				
  <table class="form-table">
	 <tr valign="top">
		<th scope="row">
		<label for="liberachat_width">Width:</label>
		</th>
			<td>
    <input type="text" 
	name="liberachat_width"
	id="liberachat_width"
	value="<?php echo get_option('liberachat_width'); ?>" size="8">
    Width of your chatroom. (Default is 100%)</td>
    </tr>
	<tr valign="top">
		<th scope="row">
			<label for="liberachat_height">Height:</label>
		</th>
	<td>
    <input type="text"
	name="liberachat_height"
	id="liberachat_height"
    value="<?php echo get_option('liberachat_height'); ?>" size="8">
    Height of your chatroom. (Default is 500)</td>		
  </tr>		
<br/>		
  </table>					
			
        <p style="font-weight: bold;">
		<code>NOTE: Users' preferences will always have priority over this configuration. For example, if a user configures that a particular nickname is used and a particular channel is accessed, then that configuration will always have priority over that of that configuration, so it will enter the channel specified in the configuration.</code></p>
            <?php submit_button(); ?>
 </form>
</div>