<form id="calculate-salary-form">
        
        <label for="skillset">Your Skillset:</label>
        <select id="skillset" required>
            <option value="engineer">Software Engineer</option>
            <option value="techpm">Tech PDM/PJM</option>
            <option value="datascience">Data Science</option>
            <option value="infra">DevOps/SRE/Cloud</option>
        </select><br>
        
        <label for="experience">Years of Relevant Experience:</label>
        <select id="experience" required>
            <option value="junior">Junior (0-3 years)</option>
            <option value="middle">Middle (4-7 years)</option>
            <option value="senior">Senior (8+ years)</option>
        </select>
        <small><a href="#" target="new">What does junior/middle/senior mean?</a></small><br>
        
        <label for="japanese">Japanese Language Level:</label>
        <select id="japanese" required>
            <option value="nonebasic">None/basic</option>
            <option value="convo">Conversational</option>
            <option value="biz">Business</option>
            <option value="fluent">Fluent/native</option>
        </select><br>
        <small><a href="#" target="new">What do the language levels mean?</a></small><br>
    
        <input type="submit" value="Calculate">
</form>
