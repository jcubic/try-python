import sys
import traceback
from browser import window, alert, console

def write(str):
    if str.endswith("\n"):
        str = str[:-1]
    term.echo(str)

sys.stdout.write = sys.stderr.write = write

code = ''
env = {}

def evaluate(code):
    global env
    try:
        ret = eval(code, env)
        if ret != None:
            write(repr(ret))
    except:
        try:
            exec(code, env)
        except:
            traceback.print_exc()

def interpreter(command, term):
    global code
    try:
        if command.endswith(":"):
            term.set_prompt("... ")
            code = code + command + "\n"
        elif code != "":
            if command == "":
                term.set_prompt(">>> ")
                evaluate(code)
                code = ""
            else:
                code = code + command + "\n"
        else:
            evaluate(command)
    except SyntaxError as msg:
        if str(msg) == 'invalid syntax : triple string end not found' or \
            str(msg).startswith('Unbalanced bracket'):
            term.set_prompt("... ")
            code = code + command

v = sys.implementation.version
term = window.terminal(interpreter, {
    "prompt": ">>> ",
    "greetings": "Brython %s.%s.%s" % (v[0], v[1], v[2]),
    "width": 600,
    "height": 255
})
