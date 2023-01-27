import os
from chat import get_response
from flask import Flask, render_template,request

app=Flask(__name__)

app.static_folder="static"

@app.route("/")
def home():
    return render_template("index.html")

@app.route("/form.html")
def form():
    return render_template("form.html")

@app.route("/chatbot.html")
def chatbot():
    return render_template("chatbot.html") 

@app.route("/get")
def get_bot_response():
    usertext=request.args.get("msg")
    return get_response(usertext)

if __name__ == "__main__":
    app.run()