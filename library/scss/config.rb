# Compass is a great cross-platform tool for compiling SASS. 
# This compass config file will allow you to 
# quickly dive right in.
# For more info about compass + SASS: http://net.tutsplus.com/tutorials/html-css-techniques/using-compass-and-sass-for-css-in-your-next-project/

require "susy"

#########
# 1. Set this to the root of your project when deployed:
http_path = "./"

# 2. Settings for the compiler: http://compass-style.org/help/tutorials/configuration-reference/
css_dir = "../css"
if (environment == :development)
  css_path = "/Users/meyertee/Sites/wordpress/wp-content/themes/formpflege/library/css"
end

sass_dir = "./"
images_dir = "../images"
javascripts_dir = "../js"
relative_assets = true
if (environment == :development)
  relative_assets = false
end


# 3. You can select your preferred output style here (can be overridden via the command line):
#output_style = :expanded
output_style = (environment == :production) ? :compressed : :expanded

# 4. When you are ready to launch your WP theme comment out (3) and uncomment the line below
# output_style = :compressed

# To disable debugging comments that display the original location of your selectors. Uncomment:
# line_comments = false

# don't touch this
preferred_syntax = :scss