package main

import (
	"bufio"
	"bytes"
	"path/filepath"
	"fmt"
	"net/http"
	"os"
	"os/exec"
	"regexp"
	"strconv"
	"strings"
	"sync"
	"time"
)

func main () {
	fmt.Println ("STTE: Program running...")
	fmt.Println ()

	// STEP 1: create info required by matt dimens
	var username string
	username = "root"
	var dailyLimit int
	dailyLimit = 1
	var prsentDay string
	prsentDay = "12340101"
	var prsentDayCount int
	prsentDayCount = 0

	// STEP 2: if there is a memorized preference, load it
	_y1 := fmt.Sprintf ("/stre/%s", filepath.Base(os.Args[0]))
	_y2, _y3 := os.ReadFile (_y1)
	
	if _y3 != nil {
		os.WriteFile (_y1, []byte (""), 0666)
	} else {
		var storeCntentFormat *regexp.Regexp
		storeCntentFormat = regexp.MustCompile (`^[0-9a-zA-Z\-]+ [1-9][0-9]* ` +
			"[0-9]{8,8}-(0|[1-9][0-9]*)$")
		if storeCntentFormat.Match (_y2) == true {
			_yM := strings.Split (string (_y2), " ")

			username = _yM [0]

			_y4, _ := strconv.Atoi (_yM [1])
			dailyLimit = _y4

			_y5 := strings.Split (_yM [2], "-")
			prsentDay = _y5 [0]

			_y6, _ := strconv.Atoi (_y5 [1])
			prsentDayCount  = _y6
		}
	}

	// STEP 3: ask for details to run with
	fmt.Println ("PRMP:")
	for {
		fmt.Println ("------Last username: " + username)
		fmt.Println ("------Should it be used? 'No' or 'Yes'?")

		_yX1, _ := bufio.NewReader (os.Stdin).ReadString ('\n')
		_yX2 := strings.Replace (_yX1, "\n", "", -1)

		if strings.ToLower (_yX2) != "no" && strings.ToLower (_yX2) != "yes" {
			fmt.Println ("------Invalid input. Enter 'no' or 'yes' (without the quotes)")
			fmt.Println ("")
			continue
		} else if strings.ToLower (_yX2) == "no" {
			fmt.Println ("")
				
			for {
				fmt.Println ("------Enter ID to use:")

				_y7, _ := bufio.NewReader (os.Stdin).ReadString ('\n')
				_y8 := strings.Replace (_y7, "\n", "", -1)

				var frm1 *regexp.Regexp
				frm1 = regexp.MustCompile (`^[0-9a-zA-Z\-]+$`)
				if frm1.MatchString (_y8) == false {
					fmt.Println ("------" + "Invalid ID. Try again.")
					fmt.Println ("")
					continue
				}

				username = _y8
				fmt.Println ("")
				break
			}
		} else {
			fmt.Println ("------Ok!")
			fmt.Println ("")
		}

		break
	}

	for {
		fmt.Println ("------Last used Daily Limit: " + strconv.Itoa (dailyLimit))
		fmt.Println ("------Should it be used? 'No' or 'Yes'?")

		_yZ1, _ := bufio.NewReader (os.Stdin).ReadString ('\n')
		_yZ2 := strings.Replace (_yZ1, "\n", "", -1)

		if strings.ToLower (_yZ2) != "no" && strings.ToLower (_yZ2) != "yes" {
			fmt.Println ("------Invalid input. Enter 'no' or 'yes' (without the quotes)")
			fmt.Println ("")
			continue
		} else if strings.ToLower (_yZ2) == "no" {
			fmt.Println ("")

			for {
				fmt.Println ("------Enter Daily Limit to use:")

				_y17, _ := bufio.NewReader (os.Stdin).ReadString ('\n')
				_y18 := strings.Replace (_y17, "\n", "", -1)

				var frm3 *regexp.Regexp
				frm3 = regexp.MustCompile ("^[1-9][0-9]*$")
				if frm3.MatchString (_y18) == false {
					fmt.Println ("------" + "Invalid ID. Try again.")
					fmt.Println ()
					continue
				}

				_y19, _ := strconv.Atoi (_y18)
				dailyLimit = _y19
				fmt.Println ("")
				break
			}
		} else {
			fmt.Println ("------Ok!")
			fmt.Println ("")
		}

		break
	}

	// STEP 4: Memorize preference
	os.WriteFile (_y1, []byte (fmt.Sprintf ("%s %d %s-%d",
		username,
		dailyLimit,
		prsentDay,
		prsentDayCount)), 0666)

	// STEP 5: startup the matt dimens
	// STEP 5.1 Dimen 1
	var dimenS1Clap chan []string
	dimenS1Clap = make (chan []string)
	var dimenS1Flap chan []string
	dimenS1Flap = make (chan []string)
	go srvc_krsr (dimenS1Clap, dimenS1Flap)

	dimenS1Clap <- []string {username, "", strconv.Itoa (dailyLimit), prsentDay,
		strconv.Itoa (prsentDayCount)}

	_x2 := strings.Replace (time.Now ().Format ("2006-01-02"), "-", "", -1)
	prsentDay = _x2
	prsentDayCount = prsentDayCount + 1
	os.WriteFile (_y1, []byte (fmt.Sprintf ("%s %d %s-%d",
		username,
		dailyLimit,
		prsentDay,
		prsentDayCount)), 0666)
		
	_x1 := <- dimenS1Flap
	if _x1 [0] == "fled" {
		fmt.Println ("STTS:")
		fmt.Println (fmt.Sprintf ("------ERRR: Could not start up dimen s1: 'srvc_krsr' [%s]",
			_x1 [1]))
		fmt.Println ("")
		return
	}

	// STEP 5.2: Dimen 2
	var dimenS2Clap chan []string
	dimenS2Clap = make (chan []string)
	var dimenS2Flap chan []string
	dimenS2Flap = make (chan []string)
	go intr_krsrHTTP (dimenS2Clap, dimenS2Flap)

	dimenS2Clap <- []string {"8001"}

	// STEP 6:
	fmt.Println ("STTE:")
	fmt.Println ("------Program has fully launched")
	for {
		select {
			case msg1 := <- dimenS1Flap: {
				if msg1 [0] == "e" {
					fmt.Println ("------ERRR (srvc_krsr):" + msg1 [1])
				} else if msg1 [0] == "0" {
					os.WriteFile (_y1, []byte (fmt.Sprintf ("%s %d %s-%s",
					username,
					dailyLimit,
					msg1 [1],
					msg1 [2])), 0666)
				} else if msg1 [0] == "2" {
					dimenS2Clap <- msg1
				}
			}
			case msg2 := <- dimenS2Flap: {
				dimenS1Clap <- msg2
			}

		}
	}
}

func srvc_krsr (clap <-chan []string, flap chan<- []string) {
	_x1 := <- clap

	var prgrm2 *exec.Cmd
	prgrm2 = exec.Command ("php",
		fmt.Sprintf ("/home/%s/google-ads-php/examples/Planning/GenerateKeywordIdeas.php",
			_x1 [0]),
		"--customerId",   "5718514237",
		"--keywordTexts", "hi",
		"--languageId",   "1000",
		"--locationIds",  "21167")
	var output bytes.Buffer
	prgrm2.Stdout = &output
	_h1 := prgrm2.Run ()

	if _h1 != nil {
		flap <- []string {"fled", _h1.Error ()}
		return
	}
	if prgrm2.String () == "" {
		flap <- []string {"fled", "No test similar keyword received"}
		return
	}

	flap <- []string {"sccs"}
	_xK, _ := strconv.Atoi (_x1 [4])
	_xK = _xK + 1
	_x1 [4] = strconv.Itoa (_xK)

	for {
		_x5 := <- clap

		_xB, _ := strconv.Atoi (_x5 [2])
		var result []string
		result = []string {"2", "sccs"}
		for r := 1; r <= 1; r ++ {
			_x6 := strings.Replace (time.Now ().Format ("2006-01-02"), "-", "", -1)
			if _x1 [3] != _x6 {
				_x1 [3] = _x6
				_x1 [4] = "0"
				flap <- []string {"0", _x1 [3], _x1 [4]}
			}

			_xR, _ := strconv.Atoi (_x1 [4])
			_xS, _ := strconv.Atoi (_x1 [2])
			if _xR >= _xS {
				flap <- []string {"2", "dcln"}
				break
			}

			var prgram *exec.Cmd
			prgram = exec.Command ("php",
				fmt.Sprintf ("/home/%s/google-ads-php/examples/Planning/GenerateKeywordIdeas.php",
					_x1 [0]),
				"--customerId",   "5718514237",
				"--keywordTexts", _x5 [1],
				"--languageId",   "1000",
				"--locationIds",  "21167")
			var kywrds bytes.Buffer
			prgram.Stdout = &kywrds
			_v1 := prgram.Run ()
			
			_xJ, _ := strconv.Atoi (_x1 [4])
			_xJ = _xJ + 1
			_x1 [4] = strconv.Itoa (_xJ)
			flap <- []string {"0", _x1 [3], _x1 [4]}

			if _v1 != nil {
				flap <- []string {"2", "fled"}
				flap <- []string {"e", _v1.Error ()}
				break
			}
			if prgram.String () == "" {
				flap <- []string {"2", "fled"}
				flap <- []string {"e", "No keyword was provided"}
				break
			}

			var nextItrt bool
			nextItrt = true
			for _, _v3 := range strings.Split (kywrds.String (), "\n") {
				_v4 := strings.Replace (_v3, ">> ", "", -1)
				_v5 := strings.Split (_v4, " | ")
			
				if _v5 [0] == "" {
					continue
				}

				if _v5 [0] == _x5 [1] {
					continue
				}
				
				result = append (result, _v5 [0])

				if _xB == (len (result) - 2) {
					nextItrt = false
					break
				}
			}

			if nextItrt == false {
				break
			}
		}
		
		flap <- result
	}
}

//|| intr:kRsrHTTP
func intr_krsrHTTP (clap <-chan []string, flap chan<- []string) {
	_x1 := <- clap

	intr_krsrHTTP_clap = clap
	intr_krsrHTTP_flap = flap
	
	http.HandleFunc ("/", func (w http.ResponseWriter, r *http.Request) {
		_x2, _x3 := r.URL.Query ()["kyword"]
		if _x3 == false || len (_x2) < 1 {
			fmt.Fprintf (w, "cErr/No keyword was provided")
			return
		}

		_x4, _x5 := r.URL.Query ()["qntity"]
		if _x5 == false || len (_x4) < 1 {
			fmt.Fprintf (w, "cErr/No quantity was provided")
			return
		}
	
		intr_krsrHTTP_lock.Lock ()
		intr_krsrHTTP_flap <- []string {"1", _x2 [0], _x4 [0]}
		_x6 := <- intr_krsrHTTP_clap
		var output string
		if _x6 [1] == "dcln" {
			output = "dcln"
		} else if _x6 [1] == "fled" {
			output = "sErr"
		} else {
			output = "sccs"
			for k, result := range _x6 {
				if k <= 1 {
					continue
				}
				output = output + "/" + result
			}	
		}
		intr_krsrHTTP_lock.Unlock ()

		fmt.Fprintf (w, output)	
	})

	http.ListenAndServe (":" + _x1 [0], nil)
}
var (
	intr_krsrHTTP_clap <-chan []string
	intr_krsrHTTP_flap chan<- []string
	intr_krsrHTTP_lock *sync.Mutex = &sync.Mutex {} )
